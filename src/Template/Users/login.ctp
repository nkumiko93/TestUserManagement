<?php
    $this->assign('title', 'ログイン画面');
?>
<div class="users form large-9 medium-8 columns content" style="margin: 40px 20px 20px 50px;">
    <h1 class="h3 mb-3 font-weight-bold text-success">ユーザ管理システム</h1>
    <?= $this->Flash->render() ?>

<?php
    $form_template = [
        // labelの設定
        'label' => '<div class="input" style="width:150px;"><label class="control-label" {{attrs}}>{{text}}</label></div>',
        // inputの設定
        'input' => '<div class="input"><input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}></div>',
        // inputとlabelを包むコンテナの設定
        'inputContainer' => '<div class="form-group"><div class="row">{{content}}</div></div>',
        // buttonの設定
        'button' => '<button{{attrs}} class="btn btn-primary">{{text}}</button>'
    ];

    echo $this->Form->create(null, [
        'templates' => $form_template
    ]);
?>
    <fieldset>
    <!-- <legend class="text-secondary font-weight-normal">ユーザ名とパスワードを入力してください。</legend> -->
<?php
    echo $this->Form->control('user_code', [
        'label' => 'ユーザコード',
        'maxlength' => '6'
        ]);
    echo $this->Form->control('password', ['label' => 'パスワード']);
?>
    </fieldset>
<?
    echo $this->Form->button('ログイン', [
        'type' => 'submit',
        'class' => 'btn btn-primary'
    ]);
    echo $this->Form->end();
?>
</div>
