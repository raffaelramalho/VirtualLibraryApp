<?php $this->layout('Template::mainTemplate', ['title' => 'Librarium', 'css' => '']);?>
<div>
    <h1><?=$this->e($errCode)?></h1>
    <p><?=$this->e($errMsg)?></p>
    <a href="<?=BASE_URL?>/">Return Home</a>
</div>