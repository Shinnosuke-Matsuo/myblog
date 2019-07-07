<?php
$this->assign('title','Blog Posts')
?>


<h1>
    Blog Posts
    <?= $this->Html->link('Add new', ['action'=>'add'], ['class'=>['pull-right','fs12']]); ?>
</h1>

<ul>
    <?php foreach ($posts as $post) : ?>
      <li>
          <?= $this->Html->link($post->title, ['controller'=>'Posts', 'action'=>'view',$post->id]); ?>
          <?= $this->Html->link('[Edit]', ['action'=>'edit', $post->id], ['class'=>['pull-right','fs12']]); ?>
          <?=
            $this->Form->postLink(
                '[x]',
                ['action'=>'delete', $post->id],
                ['confirm'=>'Are you sure', 'class'=>'fs12']
            );
          ?>
      </li>
    <?php endforeach; ?>
</ul>
