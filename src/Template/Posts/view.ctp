<?php
$this->assign('title','Blog Detail')
?>


<h1>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right','fs12']]); ?>
    <?= h($post->title); ?>
</h1>


<?php if (!$post->image == '') : ?>
    <?php
        echo $this->Html->image($post->image, array('width'=>'380','height'=>'100'));
    ?>
<?php endif; ?>


<p><?= nl2br(h($post->body)); ?></p>
<p><?= $this->Html->link($postcategory->name, ['controller'=>'Categories', 'action'=>'view',$postcategory->id]); ?></p>

<h2>Items <span class="fs12"></span></h2>
<?php foreach ($post->items as $item) : ?>
    <p><?= $item->content ; ?></p>
<?php endforeach; ?>

<h2>Tags <span class="fs12"></span></h2>
<?php foreach ($associated_tags as $associated_tag) : ?>
     <p><?= $this->Html->link($associated_tag->name, ['controller'=>'Tags', 'action'=>'view',$associated_tag->id]); ?></p>
<?php endforeach; ?>



<?php if (count($post->comments)) : ?>
<h2>Comments <span class="fs12">(<?= count($post->comments); ?>)</span></h2>
<ul>
<?php foreach ($post->comments as $comment) : ?>
    <li>
       <?= h($comment->body); ?>
       <?=
       $this->Form->postLink(
           '[x]',
           ['controller'=>'Comments','action'=>'delete', $comment->id],
           ['confirm'=>'Are you sure', 'class'=>'fs12']
       );
       ?>
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>


<h2>New Comment</h2>
<?= $this->Form->create(null, [
    'url' => ['controller'=>'Comments', 'action'=>'add']
]); ?>
<?= $this->Form->input('body'); ?>
<?= $this->Form->hidden('post_id',['value'=>$post->id]); ?>
<?= $this->Form->button('Add') ; ?>

<?= $this->Form->end(); ?>
