import { useListContext } from "../contexts/ListProvider";
import { useSortable } from "@dnd-kit/sortable";
import { CSS } from "@dnd-kit/utilities";
import Card from "@mui/joy/Card";
import CardCover from "@mui/joy/CardCover";
import CardContent from "@mui/joy/CardContent";
import Typography from "@mui/joy/Typography";
import { Ref, useState } from "react";

type Article = {
  id: string;
  attributes: {
    title: string;
  };
};

type SortableItemProps = {
  article: Article;
  imageUrl: string | null;
};

export function SortableItem({ article, imageUrl }: SortableItemProps) {
  const { selectItem } = useListContext();
  const { attributes, listeners, setNodeRef, transform, transition } =
    useSortable({ id: article.id });
  const [dragStartPos, setDragStartPos] = useState<{
    x: number;
    y: number;
  } | null>(null);

  const handlePointerDown = (e: React.PointerEvent) => {
    listeners?.onPointerDown?.(e);
    setDragStartPos({ x: e.clientX, y: e.clientY });
  };

  const style = {
    transform: CSS.Transform.toString(transform),
    transition,
    listStyle: 'none',
  };

  const handlePointerUp = (e: React.MouseEvent) => {
    if (!dragStartPos) return;

    const currentPos = { x: e.clientX, y: e.clientY };
    const distance = Math.sqrt(
      Math.pow(currentPos.x - dragStartPos.x, 2) +
        Math.pow(currentPos.y - dragStartPos.y, 2)
    );

    if (distance < 5) {
      selectItem(article.id);
    }

    setDragStartPos(null);
  };
  return (
    <li ref={setNodeRef} style={style} {...attributes} {...listeners}>
      <a onPointerDown={handlePointerDown} onPointerUp={handlePointerUp}>
        <Card sx={{ width: "100%", flexGrow: 1, height: '100%'}}>
          <CardCover>
            {imageUrl && <img src={imageUrl} loading="lazy" alt="" />}
          </CardCover>
          <CardContent>
            <Typography
              level="body-lg"
              textColor="#fff"
              sx={{ fontWeight: "lg", mt: { xs: 12, sm: 18 } }}
            >
              {article.attributes.title}
            </Typography>
          </CardContent>
        </Card>
      </a>
    </li>
  );
}
