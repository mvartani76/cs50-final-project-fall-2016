<script type="text/javascript" src="//code.highcharts.com/highcharts.js"></script>
<?php

$chart = new \Ghunti\HighchartsPHP\Highchart();
$chart->includeExtraScripts(array('highcharts-more'));
$chart->chart->renderTo = 'highcharts-container-devices-type';

$chart->chart->type = 'column';

$chart->title->text = 'Number of Device Types';

$data = array();
$cats = array();

foreach ($devicecounts as $devicecount)
{
    //$cats[] = $testvalue->id;
    $data[] = $devicecount;
}

foreach ($devicetypes as $devicetype)
{
    $cats[] = $devicetype->name;
}

$chart->yAxis->min = 0;
$chart->yAxis->title->text = 'Number';
$chart->xAxis->categories = $cats;
$chart->xAxis->labels     = [
	'enabled' => 'false'
    //'rotation' => -45,
    //'align' => 'right',
    //'style' => [
    //    'font' => 'normal 11px Arial, sans-serif'
    //]
];

$chart->series[] = array('shadow' => 1, 'name' => 'Device Types', 'data' => $data);
?>

<?php echo $chart->render('chart', null, true); ?>