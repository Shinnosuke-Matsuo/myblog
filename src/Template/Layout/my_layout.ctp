<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('styles.css') ?>
</head>
<body>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
<footer>
</footer>
</body>
</html>
