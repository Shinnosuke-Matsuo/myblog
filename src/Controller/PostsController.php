<?php

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->layout('my_layout');
        $posts = $this->Posts->find('all');
        $this->set('posts', $posts);
    }
}

?>

