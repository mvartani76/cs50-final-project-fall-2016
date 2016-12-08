<script type="text/javascript" src="//code.highcharts.com/highcharts.js"></script>
<?php

$chart = new \Ghunti\HighchartsPHP\Highchart();
$chart->includeExtraScripts(array('highcharts-more'));
$chart->chart->renderTo = 'highcharts-container-sensordata-user';

$chart->chart->type = 'column';

$chart->title->text = 'Number of Data Points by User (email)';

$data = array();
$cats = array();

foreach ($userdatacounts as $userdatacount)
{
    $data[] = $userdatacount;
}

foreach ($users as $user)
{
    $cats[] = $user->email;
}

$chart->yAxis->min = 0;
$chart->yAxis->title->text = 'Number';
$chart->xAxis->categories = $cats;
$chart->xAxis->labels     = [
	'enabled' => 'false'
];

$chart->series[] = array('shadow' => 1, 'name' => 'User Emails', 'data' => $data);
?>

<?php echo $chart->render('chart', null, true); ?>