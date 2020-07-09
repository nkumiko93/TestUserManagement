<?php
    $this->assign('title', 'ログイン画面');
?>
<div class="users form large-9 medium-8 columns content">
    <h3>ユーザ管理システム</h3>
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('ユーザ名とパスワードを入力してください') ?></legend>
        <?php
            echo $this->Form->control('user_code', [
                'style' => 'width: 200px;',
                'label' => 'ユーザコード　',
                'maxlength' => '6'
            ]);
            echo $this->Form->control('password', [
                'style' => 'width: 200px;',
                'label' => 'パスワード　'
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button('ログイン', ['type' => 'submit']) ?>
    <?= $this->Form->end() ?>
</div>
