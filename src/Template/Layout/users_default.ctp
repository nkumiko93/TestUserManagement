<?php
/**
 * ユーザ管理システム: ログインページのレイアウト定義ファイル
 */

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="ja">
<!-- <html> -->
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ管理システム: <?= $this->fetch('title') ?></title>

    <?= $this->Html->meta('icon') ?>

    <!-- Bootstrap v4.5.0 start -->
    <?= $this->Html->css('bootstrap.min') ?>
    <!-- Bootstrap v4.5.0 end -->

    <?= $this->Html->css('base_users.css') ?>
    <?= $this->Html->css('style_users.css') ?>

    <!-- jQuery ui: ver.1.12.1 start -->
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('jquery-ui.theme.min.css') ?>

    <?= $this->Html->script('jquery-3.5.1.min') ?>
    <?= $this->Html->script('jquery-ui.min') ?>
    <?= $this->Html->script('ui.datepicker-ja') ?>
    <!-- jQuery ui: ver.1.12.1 end -->

    <!-- Bootstrap v4.5.0 start -->
    <?= $this->Html->script('bootstrap.bundle.min') ?>
    <!-- Bootstrap v4.5.0 end -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
