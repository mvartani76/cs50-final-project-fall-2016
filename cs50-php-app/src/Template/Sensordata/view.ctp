<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sensordata'), ['action' => 'edit', $sensordata->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sensordata'), ['action' => 'delete', $sensordata->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensordata->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sensordata'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sensordata'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sensordata view large-9 medium-8 columns content">
    <h3><?= h($sensordata->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sensordata->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temp1') ?></th>
            <td><?= $this->Number->format($sensordata->temp1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo1') ?></th>
            <td><?= $this->Number->format($sensordata->photo1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($sensordata->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device Id') ?></th>
            <td><?= $this->Number->format($sensordata->device_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sensordata->created) ?></td>
        </tr>
    </table>
</div>
