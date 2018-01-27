-- Table: posts

-- DROP TABLE posts;

CREATE TABLE posts
(
  id serial NOT NULL,
  title character varying(100) NOT NULL,
  content text NOT NULL,
  created_at timestamp(0) without time zone DEFAULT now(),
  updated_at timestamp(0) without time zone DEFAULT now(),
  category_id integer NOT NULL,
  slug character varying(255),
  CONSTRAINT posts_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE posts
  OWNER TO dev;

-- Index: posts_slug_index

-- DROP INDEX posts_slug_index;

CREATE INDEX posts_slug_index
  ON posts
  USING btree
  (slug COLLATE pg_catalog."default");

