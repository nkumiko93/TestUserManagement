<?php
    $this->assign('title', 'ユーザ情報登録画面');

    $screenType = 'add';
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <h3>ユーザ登録画面</h3>
    <?= $this->Form->create($user) ?>

<?php
    // 共通入力項目
    include_once('common_input.ctp');
?>

<?= $this->Form->end() ?>
</div>
