<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Devicetype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="devicetypes index large-9 medium-8 columns content">
    <h3><?= __('Devicetypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($devicetypes as $devicetype): ?>
            <tr>
                <td><?= $this->Number->format($devicetype->id) ?></td>
                <td><?= h($devicetype->name) ?></td>
                <td><?= h($devicetype->created) ?></td>
                <td><?= h($devicetype->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $devicetype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $devicetype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $devicetype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devicetype->id)]) ?>
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
