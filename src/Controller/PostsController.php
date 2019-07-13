<?php

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {

        $posts = $this->Posts->find('all');
        $this->set('posts', $posts);

        $this->loadModel("Tags");
        $tags = $this->Tags->find();
        $this->set(compact("tags"));
    }

    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => (['Comments','Tags'])
        ]);
        $this->set(compact('post'));
        $this->loadModel("Categories");
        $postcategory = $this->Categories->get($post->category_id);
        $this->set(compact("postcategory"));

        $associated_tags = [];
        foreach ($post->tags as $tag) {
            $associated_tags[] = $tag;
        }
        $this->set(compact("associated_tags"));

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
        $post = $this->Posts->get($id, [
            "contain" => "Tags"
        ]);

        $post_id = $post->id;
        $this->set(compact("post_id"));

        $associated_tags_ids = [];
        foreach ($post->tags as $tag) {
            $associated_tags_ids[] = $tag->id;
        }
        $this->set(compact("associated_tags_ids"));


        $this->loadModel("Categories");
        $categories = $this->Categories->find();
        $postcategory = $this->Categories->find('all',array(
            'conditions' => array(
                'Categories.id' => $post->category_id
            )
        ));
        $this->loadModel("Tags");
        $tags = $this->Tags->find();
        $this->set(compact("postcategory"));
        $this->set(compact("categories"));
        $this->set(compact("tags"));


        if ($this->request->is(['post','put','patch'])){
            $post = $this->Posts->patchEntity($post, $this->request->data);

            $this->loadModel("PostsTags");
            $this->PostsTags->deleteAll(['post_id' => $id ]);
            $selected_tag_ids = $this->request->getData("tag");


            foreach ($selected_tag_ids as $tag_id) {
                $post_tag = $this->PostsTags->newEntity();
                $post_tag->post_id = $id;
                $post_tag->tag_id = $tag_id;
                $this->PostsTags->save($post_tag);
            }

            if($this->Posts->save($post)){
                $this->Flash->success('Edit Success');
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

