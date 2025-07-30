import { useState, useCallback } from 'react';
import { Article, IncludedData } from '../contexts/ListContext';
import { fetchArticles } from '../services/api';

const PAGE_LIMIT = 10;

export const useListLoader = () => {
  const [initItems, setItems] = useState<Article[]>([]);
  const [isLoading, setIsLoading] = useState<boolean>(true);
  const [includedData, setIncludedData] = useState<IncludedData[]>([]);
  const [error, setError] = useState<Error | null>(null);

  const [isLoadingMore, setIsLoadingMore] = useState<boolean>(false);
  const [hasMore, setHasMore] = useState<boolean>(true);

  const loadItems = useCallback(async (currentOffset: number) => {
    if (currentOffset === 0) {
      setIsLoading(true);
    } else {
      setIsLoadingMore(true);
    }
    try {
      const { data, included } = await fetchArticles({ limit: PAGE_LIMIT, offset: currentOffset });
      if (data.length > 0) {
        if (currentOffset === 0) {
          setItems(data);
        } else {
          setItems(prevItems => [...prevItems, ...data]);
        }
        if (included) {
          setIncludedData(prevItems => [...prevItems, ...included]);
        }
      }

      console.log(data.length);
      if (data.length < PAGE_LIMIT) {
        setHasMore(false);
      }
    } catch (err) {
      if (err instanceof Error) setError(err);
    } finally {
      setIsLoading(false);
      setIsLoadingMore(false);
    }
  }, []);

  return {
    initItems,
    includedData,
    isLoading,
    isLoadingMore,
    error,
    hasMore,
    loadItems,
  };
};
