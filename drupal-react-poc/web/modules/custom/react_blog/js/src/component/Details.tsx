import { useParams, Link } from "react-router-dom";
import { useState, useEffect } from "react";

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
  const [error, setError] = useState<string | null>(null);

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
        console.log(data);
        setArticle(data.data);
        if (data.included) {
          setIncludedData(data.included);
        }
      })
      .catch((err) => {
        setError(err.message);
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
    console.log(file, imageId);
    return file ? file.attributes.uri.url : null;
  };

  if (loading) return <div>Loading article...</div>;
  if (error) return <div>Error: {error}</div>;
  if (!article) return <div>Article not found.</div>;

  return (
    <article>
      <Link to="/">‹ Back to list</Link>
      <h1>{article.attributes.title}</h1>
      {getImageUrl(article.relationships.field_visual) && (
        <img
          src={getImageUrl(article.relationships.field_visual) ?? ""}
          loading="lazy"
          alt=""
        />
      )}
      <div
        dangerouslySetInnerHTML={{
          __html: article.attributes.field_body.processed,
        }}
      />
    </article>
  );
};

export default Details;
