import { JsonApiResponse } from '../contexts/ListContext'; // 以前作成した型を再利用

interface FetchParams {
  limit?: number;
  offset?: number;
}

export const fetchArticles = async ({ limit = 10, offset = 0 }: FetchParams): Promise<JsonApiResponse> => {
  const params = new URLSearchParams();
  params.append('page[limit]', String(limit));
  params.append('page[offset]', String(offset));
  params.append('sort', 'field_sort_weight');
  params.append('include', 'field_visual');
  const response = await fetch(`/jsonapi/node/blog?${params.toString()}`);

  if (!response.ok) {
    throw new Error('データの取得に失敗しました。');
  }

  return (await response.json()) as JsonApiResponse;
};
