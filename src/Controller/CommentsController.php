<?php

namespace App\Controller;

class CommentsController extends AppController
{

    public function add()
    {
        $post = $this->Posts->NewEntity();
        if ($this->request->is('post')){
            $this->Flash->success('Add Success');
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if($this->Posts->save($post)){
                return $this->redirect(['action'=>'index']);
            }else{
                // error
                $this->Flash->error('Add Error');
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

    }
}

?>
