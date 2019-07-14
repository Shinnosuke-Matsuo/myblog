<?php
$this->assign('title','Edit Post')
?>


<h1>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right','fs12']]); ?>
    Edit Post
</h1>

<h2>Adding Items area <span class="fs12"></span></h2>
<div class="contentArea">

</div>

本文<input class="textdata" type="text" name="content" placeholder="本文">
<button type="button" class="add_item">保存</button>

<h2>Editing area <span class="fs12"></span></h2>
<?= $this->Form->create($post); ?>
<?= $this->Form->input('title'); ?>
<?= $this->Form->input('image'); ?>
<?= $this->Form->input('body',['rows'=>'3']); ?>
<select name='category_id'>
    <option >カテゴリを選択</option>
    <?php foreach ( $categories as $category ): ?>
        <option value= "<?= $category->id ?>" <?= $category->id == $post->category_id ? "selected" : "" ?>>
            <?= $category->name ?>
        </option>
    <?php endforeach; ?>
</select>

<h2>Items <span class="fs12"></span></h2>
<?php foreach ($post->items as $item) : ?>
    <p><?= $item->content ; ?></p>
<?php endforeach; ?>

<h2>Tags <span class="fs12"></span></h2>
<?php foreach ( $tags as $tag ) : ?>
    <?= $this->Form->input ( $tag->name, [
        "type" => "checkbox",
        "name" => "tag[]",
        "value" => $tag->id,
        'hiddenField' => false,
        "checked" => in_array($tag->id, $associated_tags_ids, true)
    ]); ?>
<?php endforeach; ?>

<?= $this->Form->button('Save') ; ?>

<?= $this->Form->end(); ?>

<script>
    $(document).on('click','.add_item', function() {
        var post_id = <?= $post_id ?>;
        var content = $('.textdata').val();
        var csrf = $('input[name=_csrfToken]').val();
        $.ajax(
            {
                type: "POST",
                url: "/items/add",
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', csrf);
                },
                data: {
                    "post_id": post_id,
                    "content": content
                },
                dataType: "text",
                success: function (dom)
                {
                    //保存完了
                    //ここで、返り値（dom）を描画する
                    // content.show();
                    $('.contentArea').append(dom);


                    // console.log(dom);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) //通信失敗
                {
                    alert('処理できませんでした');
                }
            });
    });
</script>
