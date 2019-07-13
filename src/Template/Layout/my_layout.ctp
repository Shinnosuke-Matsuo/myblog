<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('styles.css') ?>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
    <?= $this->element('my_header') ?>
    <?= $this->Flash->render() ?>

    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
<footer>
</footer>
</body>
</html>
