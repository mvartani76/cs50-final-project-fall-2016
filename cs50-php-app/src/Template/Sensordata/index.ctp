<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sensordata'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sensordata index large-9 medium-8 columns content">
    <h3><?= __('Sensordata') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temp1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sensordata as $sensordata): ?>
            <tr>
                <td><?= $this->Number->format($sensordata->id) ?></td>
                <td><?= $this->Number->format($sensordata->temp1) ?></td>
                <td><?= $this->Number->format($sensordata->photo1) ?></td>
                <td><?= h($sensordata->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sensordata->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sensordata->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sensordata->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensordata->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
