<?php

class Post
{
    private $dbs;
    public function __construct()
    {
        $this->dbs = new Database;
    }

    public function getPosts()
    {
        $this->dbs->query("select *,
        posts.id as postid, 
        users.id as userid,
        posts.created_at as postDate

                                                     from posts
                                                     inner join users
                                                     on posts.user_id=users.id
                                                     order by posts.created_at desc
                                                     ");
        $results = $this->dbs->resultSet();
        return $results;
    }
    public function addpost($data)
    {
        $this->dbs->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');
        // Bind values
        $this->dbs->bind(':title', $data['title']);
        $this->dbs->bind(':user_id', $data['user_id']);
        $this->dbs->bind(':body', $data['body']);

        // Execute
        if ($this->dbs->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getPostById($id){
        $this->dbs->query('select * from posts where id = :id');
        $this->dbs->bind(':id', $id);
        $row = $this->dbs->single();
        return $row;

    }


    public function updatePost($data)
    {
        $this->dbs->query('update posts SET title= :title , body=:body WHERE id = :id');
        // Bind values
        $this->dbs->bind(':id', $data['id']);
        $this->dbs->bind(':title', $data['title']);
        $this->dbs->bind(':body', $data['body']);

        // Execute
        if ($this->dbs->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePost($id){
        $this->dbs->query('delete from posts WHERE id = :id');
        // Bind values
        $this->dbs->bind(':id', $id);


        // Execute
        if ($this->dbs->execute()) {
            return true;
        } else {
            return false;
        }

    }
}