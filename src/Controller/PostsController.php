<?php

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {

        $posts = $this->Posts->find('all');
        $this->set('posts', $posts);
    }

    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => 'Comments'
        ]);
        $this->set(compact('post'));
    }

//    public function add()
//    {
//        $post = $this->Posts->NewEntity();
//        if ($this->request->is('post')){
//            $this->Flash->success('Add Success');
//            $post = $this->Posts->patchEntity($post, $this->request->data);
//            if($this->Posts->save($post)){
//                return $this->redirect(['action'=>'index']);
//            }else{
//                // error
//                $this->Flash->error('Add Error');
//            };
//
//        }
//        $this->set(compact('post'));
//    }

    public function add()
    {
        $post = $this->Posts->newEntity();
        $post->title = 'New Post';
        $this->Posts->save($post);

        $this->redirect(['controller'=>'Posts','action'=>'edit',
            $post->id ]);

        $this->set(compact('post'));
    }


    public function edit($id = null)
    {
        $post = $this->Posts->get($id);
        if ($this->request->is(['post','put','patch'])){
            $this->Flash->success('Edit Success');
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if($this->Posts->save($post)){
                return $this->redirect(['action'=>'index']);
            }else{
                // error
                $this->Flash->error('Edit Error');
            };

        }
        $this->set(compact('post'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post','delete']);
        $post = $this->Posts->get($id);
            if($this->Posts->delete($post)){
                $this->Flash->success('Delete Success');
            }else{
                // error
                $this->Flash->error('Delete Error');
            };
        return $this->redirect(['action'=>'index']);

    }
}

?>

