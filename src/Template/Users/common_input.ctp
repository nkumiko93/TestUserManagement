<?php
/*
 * ユーザ情報 入力（登録・更新）画面 view 共通
 */
?>
<style type="text/css">
label {
    width: 110px;
}
</style>

<?= $this->Html->scriptStart(['block' => true]) ?>
$(function() {
    $(".user_date").datepicker({
        showOn: "button",
        buttonImage: "<?= $this->Url->build('/') ?>images/calendar.gif",
        buttonImageOnly: true,
        buttonText: "日付選択",
        yearRange: "1960:<?= date('Y')?>",
        changeYear: true,
        changeMonth: true, monthNamesShort: ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"],
        dateFormat: "yy/mm/dd"
    });
});
<?= $this->Html->scriptEnd() ?>
<fieldset>
<?php
    if ($screenType == 'add') {
        echo $this->Form->control('user_code', [
            'style' => 'width: 200px;',
            'label' => 'ユーザコード',
            'maxlength' => '6'
        ]);
    } elseif ($screenType == 'edit') {
        echo $this->Form->control('user_code', [
            'style' => 'width: 200px;',
            'label' => 'ユーザコード',
            'maxlength' => '6',
            'disabled' => 'disabled'
        ]);
    }

    echo $this->Form->control('password', [
        'style' => 'width: 200px;',
        'label' => 'パスワード'
    ]);
    echo $this->Form->control('user_name', [
        'style' => 'width: 200px;',
        'label' => '氏名'
    ]);
    echo $this->Form->control('user_kana', [
        'style' => 'width: 200px;',
        'label' => '氏名カナ'
    ]);
    echo $this->Form->control('department', [
        'style' => 'width: 200px;',
        'label' => '部署'
    ]);
    echo $this->Form->control('birth_date', [
        'label' => '生年月日',
        'type' => 'text',
        'class' => 'user_date',
        'style' => 'width: 200px;'
    ]);
    echo $this->Form->control('join_date', [
        'label' => '入職日',
        'type' => 'text',
        'class' => 'user_date',
        'style' => 'width: 200px;'
    ]);
    echo $this->Form->control('retire_date', [
        'label' => '退職日',
        'type' => 'text',
        'class' => 'user_date',
        'style' => 'width: 200px;'
    ]);

    echo "<div>";
    echo $this->Form->label('employment_status', '雇用形態');
    echo $this->Form->radio('employment_status',
        [['value' => '1', 'text' => '正社員'],
        ['value' => '2', 'text' => '契約社員'],
        ['value' => '3', 'text' => 'パート']]
    );
    echo "</div>";

    echo "<div>";
    echo $this->Form->label('delete_f', '削除フラグ');
    echo $this->Form->checkbox('delete_f', [
        'value' => '1'
    ]);
    echo "</div>";
?>
</fieldset>
<?= $this->Form->button('登録', [
    'type' => 'submit',
    'class' => 'btn btn-primary'
    ]) ?>　
<?= $this->Form->button('戻る', [
    'onclick' => 'history.back()',
    'type' => 'button',
    'class' => 'btn btn-primary'
    ]) ?>
