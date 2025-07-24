import { useState, useEffect } from "react";
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

interface Article {
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

interface IncludedData {
  id: string;
  type: string;
  attributes: {
    uri: {
      url: string;
    };
  };
}


const List = () => {
  const [articles, setArticles] = useState<Article[]>([]);
  const [includedData, setIncludedData] = useState<IncludedData[]>([]);
  const [loading, setLoading] = useState(true);

  const sensors = useSensors(
    useSensor(PointerSensor),
    useSensor(KeyboardSensor, {
      coordinateGetter: sortableKeyboardCoordinates,
    })
  );

  useEffect(() => {
    setLoading(true);
    fetch("/jsonapi/node/blog?include=field_visual")
      .then((response) => response.json())
      .then((data) => {
        setArticles(data.data);
        if (data.included) {
          setIncludedData(data.included);
        }
      })
      .finally(() => {
        setLoading(false);
      });
  }, []);

  const getImageUrl = (imageField: Article["relationships"]["field_visual"]) => {
    if (!imageField?.data) {
      return null;
    }
    const imageId = imageField.data.id;
    const file = includedData.find((item) => item.id === imageId);
    return file ? `${file.attributes.uri.url}` : null;
  };

  function handleDragEnd(event: DragEndEvent) {
    const { active, over } = event;

    if (over && active.id !== over.id) {
      setArticles((items) => {
        const oldIndex = items.findIndex((item) => item.id === active.id);
        const newIndex = items.findIndex((item) => item.id === over.id);
        return arrayMove(items, oldIndex, newIndex);
      });
    }
  }

  return (
    <DndContext
      sensors={sensors}
      collisionDetection={closestCenter}
      onDragEnd={handleDragEnd}
    >
      <SortableContext items={articles.map(article => article.id)} strategy={rectSortingStrategy}>
        <Box
          component="ul"
          sx={{ display: "flex", gap: 2, flexWrap: "wrap", p: 0, m: 0 }}
        >
          {loading
            ? Array.from(new Array(2)).map((_, index) => (
                <Skeleton key={index} variant="rectangular" height={203} width={300}>
                  <Card component="li" sx={{ minWidth: 300, flexGrow: 1 }}></Card>
                </Skeleton>
              ))
            : articles.map((article) => (
                <SortableItem
                  key={article.id}
                  article={article}
                  imageUrl={getImageUrl(article.relationships.field_visual)}
                />
              ))}
        </Box>
      </SortableContext>
    </DndContext>
  );
};

export default List;
