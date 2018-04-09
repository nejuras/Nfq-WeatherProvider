<?php
require __DIR__ . '/vendor/autoload.php';

use Nfq\Weather\OpenWeatherMapProvider;
use Nfq\Weather\YahooWeatherProvider;
use Nfq\Weather\DelegateWeatherProvider;
use Nfq\Weather\Location;

$appid = '54ed3d0b45b21a024d854a1bbcd976a0';
$lat = 54.687157;
$lon = 25.279652;

$OpenWeatherMap = new OpenWeatherMapProvider($appid);
$location = new Location($lat, $lon);

$YahooWeatherProvider = new YahooWeatherProvider();

$DelegateWeatherProvider = new DelegateWeatherProvider(array($YahooWeatherProvider, $OpenWeatherMap));
echo $DelegateWeatherProvider->fetch($location)->name;
echo "<br>";
echo $DelegateWeatherProvider->fetch($location)->temperature . " &#8451;";

