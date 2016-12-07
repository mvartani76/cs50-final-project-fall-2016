<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $devicetype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $devicetype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Devicetypes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="devicetypes form large-9 medium-8 columns content">
    <?= $this->Form->create($devicetype) ?>
    <fieldset>
        <legend><?= __('Edit Devicetype') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
