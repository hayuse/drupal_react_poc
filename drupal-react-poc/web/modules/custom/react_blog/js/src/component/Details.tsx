import { useParams, Link } from "react-router-dom";
import { useState, useEffect } from "react";
import Skeleton from "@mui/joy/Skeleton";
import { Typography } from "@mui/joy";
import { AspectRatio } from "@mui/joy";
import Box from "@mui/joy/Box";

interface Article {
  id: string;
  attributes: {
    title: string;
    field_body: {
      processed: string;
    };
  };
  relationships: {
    field_visual: {
      data: null;
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

const Details = () => {
  const { id } = useParams<{ id: string }>();
  const [article, setArticle] = useState<Article | null>(null);
  const [includedData, setIncludedData] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    if (!id) return;

    setLoading(true);
    fetch(`/jsonapi/node/blog/${id}?include=field_visual`)
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Could not fetch article with ID ${id}.`);
        }
        return response.json();
      })
      .then((data) => {
        setArticle(data.data);
        if (data.included) {
          setIncludedData(data.included);
        }
      })
      .finally(() => {
        setLoading(false);
      });
  }, [id]);

  const getImageUrl = (imageField: any) => {
    if (!imageField || !imageField.data) {
      return null;
    }
    const imageId = imageField.data.id;
    const file: any = includedData.find((item: any) => item.id === imageId);
    return file ? file.attributes.uri.url : null;
  };

  return (
    <article>
      <Link to="/">‹ Back to list</Link>

      <Typography level="h1">
        <Skeleton variant="text" level="h1" loading={loading} width="60%">
          {article?.attributes.title}
        </Skeleton>
      </Typography>
      <AspectRatio
        ratio="16/9"
        sx={{
          borderRadius: "md",
        }}
      >
        <Skeleton loading={loading}>
          <img
            src={
              loading
                ? "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                : getImageUrl(article?.relationships.field_visual) ?? ""
            }
            alt=""
            width="100%"
          />
        </Skeleton>
      </AspectRatio>
      <Box sx={{ display: "flex", flexDirection: "column", gap: 0.3, mt: 2 }}>
        {loading ? (
          <Typography sx={{ position: "relative", overflow: "hidden" }}>
            <Skeleton level="body-xs" variant="text" width="92%" />
            <Skeleton level="body-xs" variant="text" width="99%" />
            <Skeleton level="body-xs" variant="text" width="96%" />
          </Typography>
        ) : (
          <Typography sx={{ position: "relative", overflow: "hidden" }}>
            <div
              dangerouslySetInnerHTML={{
                __html: article?.attributes.field_body.processed ?? "",
              }}
            ></div>
          </Typography>
        )}
      </Box>
    </article>
  );
};

export default Details;
