<?php
//new class pages that inherit controller
class Pages extends Controller
{
  public function __construct()
  {
    $this->postModel = $this->model('post');
  }
  //showing index pages as default
  public function index(){
  $posts=$this->postModel->getPosts();
  
    $data = [
      'title' => 'shareposts',
    'posts'=>$posts

    ];
    
    //passing data
    $this->view('pages/index', $data);
  }
  //testing about page
  public function about()
  {
    $data = [
      'title' => 'about page'
    ];
    $this->view('pages/about', $data);
  }
}
//so this shitty controller gives thes named pages their specific data.. which will only return to them..
// as example.. index title is for the index page only