<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
            <!-- Only show the Page Title if the user is logged in. -->
            <?php if ($loggedIn) : ?>
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
            <?php endif; ?>
        </ul>
        <div class="top-bar-section">
            <!-- Only show the menu links if the user is logged in -->
            <?php if ($loggedIn) : ?>
                <ul class = "left">
                    <li><?= $this->Html->link(__('Dashboard'), ['controller' => 'Dashboard', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Device Types'), ['controller' => 'Devicetypes', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Sensor Data'), ['controller' => 'Sensordata', 'action' => 'index']) ?></li>
                </ul>
            <?php endif; ?>
            <ul class="right">

                <!-- Only show the logout link if the user is logged in and only show the register link if there
                    is no user logged in. -->
                <?php if ($loggedIn) : ?>
                    <li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?></li>
                <?php else : ?>
                    <li><?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']); ?></li>
                    <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <?= $this->element('footer') ?>
</body>
</html>
