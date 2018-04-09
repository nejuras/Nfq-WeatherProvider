<?php
require __DIR__ . '/vendor/autoload.php';

use Nfq\Weather\OpenWeatherMapProvider;
use Nfq\Weather\YahooWeatherProvider;
use Nfq\Weather\DelegateWeatherProvider;
use Nfq\Weather\Location;

$OpenWeatherMap = new OpenWeatherMapProvider();
$location = new Location(54.687157, 25.279652);

$YahooWeatherProvider = new YahooWeatherProvider();

$DelegateWeatherProvider = new DelegateWeatherProvider(array($YahooWeatherProvider, $OpenWeatherMap));
echo $DelegateWeatherProvider->fetch($location)->name;
echo "<br>";
echo $DelegateWeatherProvider->fetch($location)->temperature . " &#8451;";

