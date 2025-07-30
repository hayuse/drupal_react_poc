import { useListContext } from "../contexts/ListProvider";
import { ReactElement, useEffect, useRef } from "react";
import { Article } from "../contexts/ListContext";
import {
  DndContext,
  closestCenter,
  KeyboardSensor,
  PointerSensor,
  useSensor,
  useSensors,
  DragEndEvent,
} from "@dnd-kit/core";
import {
  arrayMove,
  SortableContext,
  sortableKeyboardCoordinates,
  rectSortingStrategy,
} from "@dnd-kit/sortable";

import Box from "@mui/joy/Box";
import Skeleton from "@mui/joy/Skeleton";
import Card from "@mui/joy/Card";

import { SortableItem } from "./SortableItem";

const List = () => {
  const {
    items,
    setItems,
    includedData,
    isLoading,
    isLoadingMore,
    hasMore,
    loadMoreItems,
    error,
  } = useListContext();

  const sensors = useSensors(
    useSensor(PointerSensor),
    useSensor(KeyboardSensor, {
      coordinateGetter: sortableKeyboardCoordinates,
    })
  );

  const getImageUrl = (
    imageField: Article["relationships"]["field_visual"]
  ) => {
    if (!imageField?.data) {
      return null;
    }
    const imageId = imageField.data.id;
    const file = includedData?.find((item) => item.id === imageId);
    return file ? `${file.attributes.uri.url}` : null;
  };

  const observerTarget = useRef<HTMLLIElement>(null);
  const loadingRef = useRef(isLoadingMore);

  useEffect(() => {
    loadingRef.current = isLoadingMore;
  }, [isLoadingMore]);

  useEffect(() => {
    const callback = (entries: IntersectionObserverEntry[]) => {
      const [entry] = entries;

      if (entry.isIntersecting && hasMore && !isLoadingMore) {
        loadMoreItems();
      }
    };

    const observer = new IntersectionObserver(callback, {
      root: null,
      threshold: 1.0,
    });

    const currentTarget = observerTarget.current;
    if (currentTarget) {
      observer.observe(currentTarget);
    }
    return () => {
      if (currentTarget) {
        observer.unobserve(currentTarget);
      }
    };
  }, [hasMore, isLoadingMore, loadMoreItems]);

  // 並び替えの保存（jsonAPIだけだとリクエストが増えるのでコントローラーを作った方が良さそう）
  async function handleDragEnd(event: DragEndEvent) {
    const { active, over } = event;
    if (over && active.id !== over.id) {
      setItems((sortItems) => {
        const oldIndex = sortItems.findIndex((item) => item.id === active.id);
        const newIndex = sortItems.findIndex((item) => item.id === over.id);
        return arrayMove(sortItems, oldIndex, newIndex);
      });
      try {
        const tokenResponse = await fetch("/session/token");
        const csrfToken = await tokenResponse.text();

        const updatePromises = items.map((item, index) => {
          const payload = {
            data: {
              type: "node--blog",
              id: item.id,
              attributes: {
                field_sort_weight: index,
              },
            },
          };

          return fetch(`/jsonapi/node/blog/${item.id}`, {
            method: "PATCH",
            headers: {
              "Content-Type": "application/vnd.api+json",
              "X-CSRF-Token": csrfToken,
            },
            body: JSON.stringify(payload),
          });
        });

        const responses = await Promise.all(updatePromises);

        for (const res of responses) {
          if (!res.ok) {
            throw new Error(`保存に失敗しました: ${res.statusText}`);
          }
        }
      } catch (error) {
        console.error("保存に失敗しました:", error);
      }
    }
  }

  // スケルトンスクリーンの統一
  const listLoading = () => {
    const loadingDom: Array<ReactElement> = [];
    Array.from(new Array(10)).map((_, index) => {
      loadingDom.push(
        <Skeleton key={index} variant="rectangular" height={203} width="100%">
          <Card
            component="li"
            sx={{ width: "100%", height: "100%", flexGrow: 1 }}
          ></Card>
        </Skeleton>
      );
    });
    return loadingDom;
  };

  return (
    <DndContext
      sensors={sensors}
      collisionDetection={closestCenter}
      onDragEnd={handleDragEnd}
    >
      <SortableContext
        items={items.map((article) => article.id)}
        strategy={rectSortingStrategy}
      >
        <Box
          component="ul"
          sx={{
            display: "grid",
            gridTemplateColumns: "1fr 1fr",
            gap: "5px",
            p: 0,
            m: 0,
            overflowY: "auto",
            overflowX: "hidden",
            height: "100%",
            width: "50%",
          }}
          className="scroll-container"
        >
          {isLoading
            ? listLoading()
            : items.map((article, index) => (
                <SortableItem
                  key={article.id}
                  article={article}
                  imageUrl={getImageUrl(article.relationships.field_visual)}
                />
              ))}
          {isLoadingMore ? listLoading() : <li ref={observerTarget}></li>}
        </Box>
      </SortableContext>
    </DndContext>
  );
};

export default List;
