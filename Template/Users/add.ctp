<?php
    $this->assign('title', 'ユーザ情報登録画面');
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
    <fieldset>
    <?php
        // 入力フォーム
        echo $this->Form->control('user_code', [
            'style' => 'width: 200px;',
            'label' => 'ユーザコード　',
            'maxlength' => '6'
        ]);
        echo $this->Form->control('password', [
            'style' => 'width: 200px;',
            'label' => 'パスワード　　'
        ]);
        echo $this->Form->control('user_name', [
            'style' => 'width: 200px;',
            'label' => '氏名　　　　　'
        ]);
        echo $this->Form->control('user_kana', [
            'style' => 'width: 200px;',
            'label' => '氏名カナ　　　'
        ]);
        echo $this->Form->control('department', [
            'style' => 'width: 200px;',
            'label' => '部署　　　　　'
        ]);
        echo $this->Form->control('birth_date', [
            'label' => '生年月日　　　',
            'minYear' => (date('Y') - 70),
            'maxYear' => date('Y'),
            'orderYear' => 'asc',
            'monthNames' => false, // 月は数字で表示されます。
            'empty' => true
        ]);
        echo $this->Form->control('join_date', [
            'label' => '入職日　　　　',
            'minYear' => (date('Y') - 20),
            'maxYear' => date('Y'),
            'orderYear' => 'asc',
            'monthNames' => false, // 月は数字で表示されます。
            'empty' => false
        ]);
        echo $this->Form->control('retire_date', [
            'label' => '退職日　　　　',
            'minYear' => (date('Y') - 20),
            'maxYear' => date('Y'),
            'orderYear' => 'asc',
            'monthNames' => false, // 月は数字で表示されます。
            'empty' => true
        ]);
        echo $this->Form->label('employment_status', '雇用形態　　　');
        echo $this->Form->radio('employment_status', 
            [['value' => '1', 'text' => '正社員　'],
            ['value' => '2', 'text' => '契約社員　'],
            ['value' => '3', 'text' => 'パート']]
        );
    ?>
    </fieldset>
    <?= $this->Form->button('登録', ['type' => 'submit']) ?>
    <?= $this->Form->button('戻る', ['onclick' => 'history.back()', 'type' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
