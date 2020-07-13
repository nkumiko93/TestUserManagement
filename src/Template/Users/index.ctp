<?php
    $this->assign('title', 'ユーザ一覧');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h1 class="h3 mb-3 font-weight-bold text-success">ユーザリスト画面</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('user_code', 'ユーザコード') ?></th>
            <th><?= $this->Paginator->sort('user_name', '氏名') ?></th>
            <th><?= $this->Paginator->sort('department', '雇用形態') ?></th>
            <th><?= $this->Paginator->sort('join_date', '入職日') ?></th>
            <th><?= $this->Paginator->sort('retire_date', '退職日') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user):
        if (empty($user->retire_date)) {
            echo "<tr>\n";
        } else {
            echo "<tr class='table-secondary'>\n";
        }
    ?>
            <td><?= $this->Html->link(__(h($user->user_code)), ['action' => 'edit', $user->id]) ?></td>
            <td><?= h($user->user_name) ?></td>
            <td><?= h($user->department) ?></td>
            <td><?= h($user->join_date) ?></td>
            <td><?= h($user->retire_date) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('最初へ')) ?>
            <?= $this->Paginator->prev('< ' . __('前へ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次へ') . ' >') ?>
            <?= $this->Paginator->last(__('最後へ') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('{{page}} / {{pages}} ページ,　{{start}} - {{end}} / {{count}} 件')]) ?></p>
    </div>
<?php
    echo $this->Form->create($user, ['action' => 'add', 'type' => 'get']) . "\n";
    echo $this->Form->button('新規登録', ['type' => 'submit', 'class' => 'btn btn-primary']) . "\n";
    echo $this->Form->end() . "\n";
?>
</div>