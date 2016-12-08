<?php


$theme = new \Ghunti\HighchartsPHP\HighchartOption();
$theme->colors = [
    '#003771',
    '#2363a6',
    '#6ca4df',
    '#dbe1e8',
    '#879bb1',
    '#75808c',
    '#546372'
];

echo '<script>';
echo \Ghunti\HighchartsPHP\Highchart::setOptions($theme);
echo '</script>';