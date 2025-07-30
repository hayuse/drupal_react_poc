import { createContext } from 'react';

export interface Article {
  id: string;
  attributes: {
    title: string;
  };
  links: {
    self: {
      href: string;
    };
  };
  relationships: {
    field_visual: {
      data: null | { id: string };
      links: {
        related: {
          href: string;
        };
        self: {
          href: string;
        };
      };
    };
  };
}

export interface JsonApiResponse {
  data: any;
  included: any;
}

export interface IncludedData {
  id: string;
  type: string;
  attributes: {
    uri: {
      url: string;
    };
  };
}

export interface ListContextType {
  items: Article[];
  isLoading: boolean;
}

export const ListContext = createContext<ListContextType | null>(null);
