<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Devicetype'), ['action' => 'edit', $devicetype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Devicetype'), ['action' => 'delete', $devicetype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devicetype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Devicetypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Devicetype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="devicetypes view large-9 medium-8 columns content">
    <h3><?= h($devicetype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($devicetype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($devicetype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($devicetype->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($devicetype->modified) ?></td>
        </tr>
    </table>
</div>
