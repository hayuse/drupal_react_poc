import { Link } from "react-router-dom";
import { useState, useEffect } from "react";
import Card from "@mui/joy/Card";
import Box from "@mui/joy/Box";
import CardCover from "@mui/joy/CardCover";
import CardContent from "@mui/joy/CardContent";
import Typography from "@mui/joy/Typography";

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

const List = () => {
  const [articles, setArticles] = useState<Article[]>([]);
  const [includedData, setIncludedData] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    setLoading(true);
    fetch("/jsonapi/node/blog?include=field_visual")
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        setArticles(data.data);
        if (data.included) {
          setIncludedData(data.included);
        }
      })
      .finally(() => {
        setLoading(false);
      });
  }, []);

  const getImageUrl = (imageField: any) => {
    if (!imageField || !imageField.data) {
      return null;
    }
    const imageId = imageField.data.id;
    const file: any = includedData.find((item: any) => item.id === imageId);
    return file ? file.attributes.uri.url : null;
  };

  if (loading) return <div>Loading</div>;

  return (
    <Box
      component="ul"
      sx={{ display: "flex", gap: 2, flexWrap: "wrap", p: 0, m: 0 }}
    >
      {articles.map((article) => (
        <Link to={`/details/${article.id}`}>
          <Card component="li" sx={{ minWidth: 300, flexGrow: 1 }}>
            <CardCover>
              {getImageUrl(article.relationships.field_visual) && (
                <img
                  src={getImageUrl(article.relationships.field_visual) ?? ""}
                  loading="lazy"
                  alt=""
                />
              )}
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
        </Link>
      ))}
    </Box>
  );
};

export default List;
