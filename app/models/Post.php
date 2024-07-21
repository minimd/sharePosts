<?php

class Post{
    private $dbs;
    public function __construct(){
        $this->dbs = new Database;
    }

    public function getPosts(){
        $this->dbs->query("select * from posts");
        return $this->dbs->resultSet();
    }
}