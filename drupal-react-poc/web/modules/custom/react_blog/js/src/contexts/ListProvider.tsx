import React, { useState, useCallback, useEffect, useContext, createContext, ReactNode } from 'react';
import { Article, IncludedData } from './ListContext';
import { useListLoader } from '../hooks/useListLoader';

interface ListContextType {
  items: Article[];
  setItems: React.Dispatch<React.SetStateAction<Article[]>>;
  includedData: IncludedData[] | null;
  isLoading: boolean;
  isLoadingMore: boolean;
  error: Error | null;
  hasMore: boolean;
  loadMoreItems: () => void;
  selectedId: string | null;
  selectItem: (id: string | null) => void;
}

const ListContext = createContext<ListContextType | null>(null);

export function ListProvider({ children }: { children: ReactNode }) {
  const { initItems,includedData, isLoading, isLoadingMore, error, hasMore, loadItems } = useListLoader();
  const [selectedId, setSelectedId] = useState<string | null>(null);
  const [items, setItems] = useState<Article[]>([]);

  const selectItem = useCallback((id: string | null) => {
    setSelectedId(id);
  }, []);
  useEffect(() => {
    if (initItems) {
      setItems(initItems);
    }
  }, [initItems]);

  useEffect(() => {
    loadItems(0);
  }, [loadItems]);

  const loadMoreItems = () => {
    if (hasMore && !isLoadingMore) {
      const nextOffset = items.length;
      loadItems(nextOffset);
    }
  };

  const value = {
    items,
    setItems,
    includedData,
    isLoading,
    isLoadingMore,
    error,
    hasMore,
    loadMoreItems,
    selectedId,
    selectItem,
  };

  return <ListContext.Provider value={value}>{children}</ListContext.Provider>;
}

export const useListContext = () => {
  const context = useContext(ListContext);
  if (!context) {
    throw new Error('useListContextはListProviderの中で使用する必要があります');
  }
  return context;
};
