<?php
$this->assign('title','Blog Detail')
?>


<h1>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right','fs12']]); ?>
    <?= h($post->title); ?>
</h1>

<p><?= nl2br(h($post->body)); ?></p>
