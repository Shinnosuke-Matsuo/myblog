<?php

namespace App\Controller;

class PostsController extends AppController
{
    public function add()
    {
        $this->viewBuilder()->setLayout(false);

        $item = $this->Items->newEntity();
        $item = $this->Items->patchEntity($item, $this->request->getData());
        $this->Items->save($item);
        $this->set(compact('item'));
    }
}

?>
