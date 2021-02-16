<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
    <?php foreach($this->css($this->e($css)) as $link):?>
    <?=$link?>
    <?php endforeach;?>
    <link rel="icon" href="assets/book.svg" type="image/svg+xml">
    <script src="https://kit.fontawesome.com/84f133515c.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <?=$this->section('content')?>
</body>
</html>