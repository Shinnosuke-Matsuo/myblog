<?php
$this->assign('title','Tags Detail')
?>

<h1>
    Posts of this Tag
    <?= h($tag->name); ?>
</h1>

<ul>
    <?php foreach ($tag->posts as $post) : ?>
        <li>
            <?= $this->Html->link($post->title, ['controller'=>'Posts', 'action'=>'view',$post->id]); ?>
        </li>
    <?php endforeach; ?>
</ul>
