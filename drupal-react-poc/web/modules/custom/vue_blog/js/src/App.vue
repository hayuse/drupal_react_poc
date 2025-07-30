<script setup lang="ts">
import { ref, onMounted, watch, onBeforeUnmount } from 'vue'
// 1. draggableコンポーネントをインポート
import draggable from 'vuedraggable'

// --- 設定 ---
const POSTS_PER_PAGE = 8; // 1度に読み込む記事数 (2カラムなので偶数がおすすめです)

// --- 型定義 ---

interface List {
  id: string
  title: string
  visual?: string
}

interface Details {
  id: string
  title: string
  body: string
  visual?: string
}

interface ArticleList {
  id: string;
  attributes: { title: string; };
  links: { self: { href: string; }; };
  relationships: { field_visual: { data: null | { id: string }; links: { related: { href: string; }; self: { href: string; }; }; }; };
}

interface Article {
  id: string;
  attributes: { title: string; field_body: { processed: string; }; };
  relationships: { field_visual: any};
}

interface IncludedData {
  id: string;
  type: string;
  attributes: { uri: { url: string; }; };
}

interface DrupalApiResponse {
  data: ArticleList[];
  included: IncludedData[];
  links?: {
    next?: {
      href: string;
    };
  };
}

// --- リアクティブな状態定義 ---

const posts = ref<List[]>([])
const selectedPostDetail = ref<Details | null>(null)
const selectedPostId = ref<string | null>(null)

const isListLoading = ref<boolean>(false)
const isDetailLoading = ref<boolean>(false)
const error = ref<string | null>(null)

const nextPageUrl = ref<string | null>(null)
const isListLoadingMore = ref(false)
const sentinel = ref<HTMLElement | null>(null)

// 2. 並び順保存中の状態を追加
const isSavingOrder = ref(false);

// --- API通信ロジック ---

// 記事リストを読み込む汎用関数
async function loadPosts(url: string) {
  error.value = null;
  try {
    const response = await fetch(url)
    if (!response.ok) throw new Error('ブログの取得に失敗しました。')

    const jsonResponse: DrupalApiResponse = await response.json()
    nextPageUrl.value = jsonResponse.links?.next?.href || null

    const includedData = jsonResponse.included || [];
    const imageMap = new Map<string, string>();
    includedData.forEach(item => imageMap.set(item.id, item.attributes.uri.url));

    const newPosts = jsonResponse.data.map(resource => {
      const imageId = resource.relationships.field_visual.data?.id;
      const visualUrl = imageId ? imageMap.get(imageId) : undefined;
      return {
        id: resource.id,
        title: resource.attributes.title,
        visual: visualUrl,
      }
    })
    posts.value.push(...newPosts)
  } catch (e: any) {
    error.value = e.message
  }
}

// 初回読み込み用の関数
async function initialLoad() {
  isListLoading.value = true
  posts.value = []
  // sort=field_sort_weight で重み順にソート
  const initialUrl = `/jsonapi/node/blog?include=field_visual&sort=field_sort_weight&page[limit]=${POSTS_PER_PAGE}`
  await loadPosts(initialUrl)
  isListLoading.value = false
}

// 追加読み込み用の関数
async function loadMore() {
  if (!nextPageUrl.value || isListLoadingMore.value || isListLoading.value) return
  isListLoadingMore.value = true
  await loadPosts(nextPageUrl.value)
  isListLoadingMore.value = false
}

// 詳細取得用の関数
async function fetchPostDetail(id: string) {
  isDetailLoading.value = true
  selectedPostDetail.value = null
  error.value = null
  try {
    const response = await fetch(`/jsonapi/node/blog/${id}?include=field_visual`)
    if (!response.ok) throw new Error('ブログ詳細の取得に失敗しました。')

    const jsonResponse: { data: Article, included: IncludedData[] } = await response.json()
    const resource = jsonResponse.data
    const includedData = jsonResponse.included || [];
    let visualUrl: string | undefined = undefined;
    const visualRel = resource.relationships.field_visual.data;
    if (visualRel && includedData) {
      const file = includedData.find((item: IncludedData) => item.id === visualRel.id);
      if (file) {
        visualUrl = file.attributes.uri.url;
      }
    }

    selectedPostDetail.value = {
      id: resource.id,
      title: resource.attributes.title,
      body: resource.attributes.field_body?.processed || '本文がありません。',
      visual: visualUrl,
    }
  } catch (e: any) {
    error.value = e.message
  } finally {
    isDetailLoading.value = false
  }
}

// 3. 並び順を保存する関数を追加
async function updateSortOrder() {
  isSavingOrder.value = true;
  error.value = null;

  // posts配列の現在の順序に基づいて、各記事の重みを更新するリクエストを作成
  const tokenResponse = await fetch("/session/token");
  const csrfToken = await tokenResponse.text();

  const requests = posts.value.map((post, index) => {
    const payload = {
      data: {
        type: 'node--blog',
        id: post.id,
        attributes: {
          field_sort_weight: index,
        },
      },
    };
    return fetch(`/jsonapi/node/blog/${post.id}`, {
      method: 'PATCH',
      headers: {
        'Content-Type': 'application/vnd.api+json',
        "X-CSRF-Token": csrfToken,
      },
      body: JSON.stringify(payload),
    });
  });

  try {
    const responses = await Promise.all(requests);
    // 1つでも失敗したリクエストがあればエラーを投げる
    for (const res of responses) {
      if (!res.ok) {
        throw new Error(`並び順の保存に失敗しました (Status: ${res.status})`);
      }
    }
  } catch (e: any) {
    error.value = e.message;
    // エラーが発生した場合、サーバーの順序にリストを戻す
    await initialLoad();
  } finally {
    isSavingOrder.value = false;
  }
}


// --- ライフサイクルと監視 ---

let observer: IntersectionObserver | null = null

onMounted(() => {
  initialLoad()
  observer = new IntersectionObserver(
    (entries) => { if (entries[0].isIntersecting) { loadMore() } },
    { threshold: 0.1 }
  )
  if (sentinel.value) { observer.observe(sentinel.value) }
})

onBeforeUnmount(() => { if (observer) { observer.disconnect() } })

watch(selectedPostId, (newId) => { if (newId) { fetchPostDetail(newId) } })

function handlePostSelect(id: string) { selectedPostId.value = id }
</script>

<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12" md="6">
        <v-sheet rounded="lg">
          <v-alert v-if="error && !isListLoading" type="error" dense>{{ error }}</v-alert>

          <div style="max-height: 50vh; overflow-y: auto;" class="pr-2">
            <!-- 5. draggableコンポーネントでラップ -->
            <draggable v-model="posts" item-key="id" tag="v-row" :component-data="{ dense: true }"
              @end="updateSortOrder" :disabled="isListLoadingMore || isSavingOrder" ghost-class="ghost">
              <template #item="{ element: post }: { element: List }">
                <v-col cols="12" sm="6" style="cursor: grab;">
                  <v-card @click="handlePostSelect(post.id)"
                    :variant="post.id === selectedPostId ? 'tonal' : 'elevated'" hover height="100%">
                    <v-img v-if="post.visual" :src="post.visual" height="150px" cover class="align-end text-white">
                      <v-card-title class="text-subtitle-1"
                        style="background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));">
                        {{ post.title }}
                      </v-card-title>
                    </v-img>
                    <v-card-title v-else class="text-subtitle-1">{{ post.title }}</v-card-title>
                  </v-card>
                </v-col>
              </template>
            </draggable>

            <div v-if="isListLoadingMore" class="text-center pa-4">
              <v-progress-circular indeterminate color="primary"></v-progress-circular>
            </div>
            <div ref="sentinel"></div>
          </div>
          <div class="d-flex align-center mt-4">
            <v-chip v-if="isSavingOrder" color="primary" variant="tonal" size="small" class="ml-4">
              <v-progress-circular indeterminate size="16" width="2" class="mr-2"></v-progress-circular>
              保存中...
            </v-chip>
            <v-progress-circular v-else-if="isListLoading" indeterminate color="primary" size="24"
              class="ml-4"></v-progress-circular>
          </div>
        </v-sheet>
      </v-col>

      <v-col cols="12" md="6">
        <v-card rounded="lg" style="position: sticky; top: 16px;">
          <div v-if="isDetailLoading" class="pa-4">
            <v-skeleton-loader type="image, article, actions"></v-skeleton-loader>
          </div>
          <div v-else-if="selectedPostDetail" style="max-height: 50vh; overflow-y: auto;">
            <v-img v-if="selectedPostDetail.visual" :src="selectedPostDetail.visual" height="300px" cover
              class="bg-grey-lighten-2"></v-img>
            <v-card-title class="text-h5">{{ selectedPostDetail.title }}</v-card-title>
            <v-card-text class="text-body-1" v-html="selectedPostDetail.body"></v-card-text>
          </div>
          <div v-else class="d-flex flex-column justify-center align-center pa-5 text-center text-grey"
            style="min-height: 400px;">
            <v-icon size="x-large" class="mb-2">mdi-text-box-search-outline</v-icon>
            <p>左側のリストからブログを選択してください。</p>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<!-- 6. ドラッグ中のスタイルを追加 -->
<style>
.ghost {
  opacity: 0.5;
  background: #c8ebfb;
}
</style>
