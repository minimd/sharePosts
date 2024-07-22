<?php

class Posts extends Controller
{
    public function __construct()
    {

        if (!isLoggedIn()) {
            redirect("users/login");
        }
        $this->postModel = $this->model("post");
        $this->userModel = $this->model("user");
    }
    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view("posts/index", $data);
    }
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => '',
            ];
            //validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'please enter body text';
            }
            if (empty($data['title_err']) && empty($data['body_err'])) {
                //validated
                if ($this->postModel->addpost($data)) {
                    flash('post added', 'post added ');
                    redirect('posts');
                } else {
                    die('something went wrong');
                }
            } else {
                //load view
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => '',
            ];
            $this->view("posts/add", $data);
        }
    }
    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'id'=>$id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => '',
            ];
            //validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'please enter body text';
            }
            if (empty($data['title_err']) && empty($data['body_err'])) {
                //validated
                if ($this->postModel->updatePost($data)) {
                    flash('post updated', 'post updated ');
                    redirect('posts');
                } else {
                    die('something went wrong');
                }
            } else {
                
               
                //load view
                $this->view('posts/add', $data);
            }
        } else {
            //get current post
            $post = $this->postModel->getPostById($id);
            //check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            $data = [
                'id'=> $id,
                'title' =>$post->title,
                'body' =>$post->body ,
            ];
            $this->view("posts/edit", $data);
        }
    }

    public function show($id){
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);
        $data=[
            'post'=> $post  ,
            'user'=> $user
        ];
        $this->view('posts/show', $data);
    }
    public function delete($id){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            if ($this->postModel->deletePost($id)) {

                flash('post_message','post_deleted');
                redirect('posts');
            }
            else{
                die('something went horribly wrong');
            }

        }
        else{
            redirect('posts');
        }
    }
    
}
