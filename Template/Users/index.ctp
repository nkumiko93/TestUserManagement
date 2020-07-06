<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3>ユーザリスト画面</h3>
    <table>
    <thead>
        <tr>
            <th>ユーザコード</th>
            <th>氏名</th>
            <th>雇用形態</th>
            <th>入職日</th>
            <th>退職日</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Html->link(__(h($user->user_code)), ['action' => 'edit', $user->id]) ?></td>
            <td><?= h($user->user_name) ?></td>
            <td><?= h($user->department) ?></td>
            <td><?= h($user->join_date) ?></td>
            <td><?= h($user->retire_date) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php
        echo $this->Form->create($user, ['action' => 'add', 'type' => 'get']) . "\n";
        echo $this->Form->button('新規登録', ['type' => 'submit']) . "\n";
        echo $this->Form->end() . "\n";
    ?>
</div>