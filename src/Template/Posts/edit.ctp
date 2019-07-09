<?php
$this->assign('title','Edit Post')
?>


<h1>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right','fs12']]); ?>
    Edit Post
</h1>


<?= $this->Form->create($post); ?>
<?= $this->Form->input('title'); ?>
<?= $this->Form->input('image'); ?>
<?= $this->Form->input('body',['rows'=>'3']); ?>
<select name='category_id'>
    <option >カテゴリを選択</option>
    <?php foreach ( $categories as $category ): ?>
        <option value= "<?= $category->id ?>" <?= $category->id === $post->category_id ? "selected" : "" ?>>
            <?= $category->name ?>
        </option>
    <?php endforeach; ?>
</select>

<?php foreach ( $tags as $tag ) : ?>
    <?= $this ->Form->input ( "check", [
        "type" => "checkbox",
        "value" => "$tag->id",
        "label" => "$tag->name" ] ); ?>
<?php endforeach; ?>

<?= $this->Form->button('Save') ; ?>

<?= $this->Form->end(); ?>

