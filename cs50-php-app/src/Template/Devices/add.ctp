<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="devices form large-9 medium-8 columns content">
    <?= $this->Form->create($device) ?>
    <fieldset>
        <legend><?= __('Add Device') ?></legend>
        <?php
            echo $this->Form->input('deviceName');
            echo $this->Form->input('deviceType_id', ['options' => $devicetypes]);
            // Using currently logged in user as the user_id so hiding the form input value
            echo $this->Form->hidden('user_id', ['default' => $users]);
            echo $this->Form->input('token');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
