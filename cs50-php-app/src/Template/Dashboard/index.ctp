<?php $this->set('pageTitle', 'Dashboard'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Real-Time Charts'), ['action' => 'realtime']) ?></li>
        <li><?= $this->Html->link(__('Time Series Charts'), ['action' => 'timecharts']) ?></li>
    </ul>
</nav>
<div class="dashboard index large-9 medium-8 columns content">

    <div id="highcharts-container-devices-type"></div>
        <?= $this->element('Charts/chart-devices-type', $devicecounts) ?>
    <div id="highcharts-container-devices-user"></div>
        <?= $this->element('Charts/chart-devices-user', $usercounts) ?>
</div>

