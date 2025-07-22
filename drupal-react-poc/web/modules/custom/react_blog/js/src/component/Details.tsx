import { useParams, Link } from "react-router-dom";
import { useState, useEffect } from 'react';

interface Article {
  id: string;
  attributes: {
    title: string;
    field_body: {
      processed: string;
    };
  };
}

const Details = () => {
  const { id } = useParams<{ id: string }>();
  const [article, setArticle] = useState<Article | null>(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    if (!id) return;

    setLoading(true);
    fetch(`/jsonapi/node/blog/${id}?include=field_visual`)
      .then(response => {
        if (!response.ok) {
          throw new Error(`Could not fetch article with ID ${id}.`);
        }
        return response.json();
      })
      .then(data => {
        console.log(data);
        setArticle(data.data);
      })
      .catch(err => {
        setError(err.message);
      })
      .finally(() => {
        setLoading(false);
      });
  }, [id]);

  if (loading) return <div>Loading article...</div>;
  if (error) return <div>Error: {error}</div>;
  if (!article) return <div>Article not found.</div>;

  return (
    <article>
      <Link to="/">‹ Back to list</Link>
      <h1>{article.attributes.title}</h1>
      <div dangerouslySetInnerHTML={{ __html: article.attributes.field_body.processed }} />
    </article>
  );
};

export default Details;
