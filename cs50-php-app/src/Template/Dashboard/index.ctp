<?php $this->set('pageTitle', 'Dashboard'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Real-Time Charts'), ['action' => 'realtime']) ?></li>
    </ul>
</nav>
<div class="dashboard index large-9 medium-8 columns content">
    <div id="highcharts-container-devices-type"></div>
        <?= $this->element('Charts/chart-devices-type', $devicecounts) ?>
    <div id="highcharts-container-devices-user"></div>
        <?= $this->element('Charts/chart-devices-user', $usercounts) ?>
    <div id="highcharts-container-sensordata-device"></div>
        <?= $this->element('Charts/chart-sensordata-device', $devicedatacounts) ?>
    <div id="highcharts-container-sensordata-user"></div>
        <?= $this->element('Charts/chart-sensordata-user', $userdatacounts) ?>
</div>

