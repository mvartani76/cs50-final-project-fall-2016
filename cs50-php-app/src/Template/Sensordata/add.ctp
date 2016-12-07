<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sensordata'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sensordata form large-9 medium-8 columns content">
    <?= $this->Form->create($sensordata) ?>
    <fieldset>
        <legend><?= __('Add Sensordata') ?></legend>
        <?php
            echo $this->Form->input('temp1');
            echo $this->Form->input('photo1');
            echo $this->Form->input('user_id');
            echo $this->Form->input('device_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
