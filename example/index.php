<?php

ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
require(dirname(__DIR__) . '/vendor/autoload.php');

use Alonexy\Converter\QualityConverter;
use Alonexy\Converter\Quality;


var_dump(QualityConverter::Parse(1, Quality::METRIC_TONNE, 10)->ConvertTo(Quality::METRIC_KILO_GARM,4));
var_dump(QualityConverter::Parse(1, Quality::METRIC_TONNE, 10)->ConvertTo(Quality::METRIC_GRAM,4));
var_dump(QualityConverter::Parse(1, Quality::METRIC_TONNE, 10)->ConvertTo(Quality::METRIC_MILLI_GRAM,4));

var_dump(QualityConverter::Parse(1, Quality::AVOIR_OUNCE, 10)->ConvertTo(Quality::METRIC_GRAM,7));
var_dump(QualityConverter::Parse(1, Quality::TROY_OUNCE, 10)->ConvertTo(Quality::METRIC_GRAM,7));

