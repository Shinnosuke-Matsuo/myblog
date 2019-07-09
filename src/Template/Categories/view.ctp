<?php
$this->assign('title','Categories Detail')
?>

<h1>
    Posts of this category
    <?= h($category->name); ?>
</h1>

<ul>
    <?php foreach ($category->posts as $post) : ?>
        <li>
            <?= $this->Html->link($post->title, ['controller'=>'Posts', 'action'=>'view',$post->id]); ?>
        </li>
    <?php endforeach; ?>
</ul>
