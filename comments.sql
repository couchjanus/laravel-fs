- Table: comments

-- DROP TABLE comments;

CREATE TABLE comments
(
  id serial NOT NULL,
  title character varying(255),
  body text NOT NULL,
  commentable_id integer NOT NULL,
  commentable_type character varying(255) NOT NULL,
  creator_id integer NOT NULL,
  creator_type character varying(255) NOT NULL,
  _lft integer NOT NULL DEFAULT 0,
  _rgt integer NOT NULL DEFAULT 0,
  parent_id integer,
  created_at timestamp(0) without time zone,
  updated_at timestamp(0) without time zone,
  CONSTRAINT comments_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE comments
  OWNER TO dev;

-- Index: comments__lft__rgt_parent_id_index

-- DROP INDEX comments__lft__rgt_parent_id_index;

CREATE INDEX comments__lft__rgt_parent_id_index
  ON comments
  USING btree
  (_lft, _rgt, parent_id);

-- Index: comments_commentable_id_commentable_type_index

-- DROP INDEX comments_commentable_id_commentable_type_index;

CREATE INDEX comments_commentable_id_commentable_type_index
  ON comments
  USING btree
  (commentable_id, commentable_type COLLATE pg_catalog."default");

-- Index: comments_creator_id_creator_type_index

-- DROP INDEX comments_creator_id_creator_type_index;

CREATE INDEX comments_creator_id_creator_type_index
  ON comments
  USING btree
  (creator_id, creator_type COLLATE pg_catalog."default");

