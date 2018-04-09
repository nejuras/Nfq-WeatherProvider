<?php

namespace Nfq\Weather;

class OpenWeatherMapProvider implements WeatherProviderInterface
{
    /**
     * @param Location $location
     * @return Weather
     */
    public function fetch(Location $location):Weather
    {
        $url = "http://api.openweathermap.org/data/2.5/weather?lat={$location->lat}&lon={$location->lon}&appid=54ed3d0b45b21a024d854a1bbcd976a0";
        $json = file_get_contents($url);
        $data = json_decode($json);
        $temperature = $data->main->temp;
        $temperature_type = 'K';
        $providerName = 'Open Weather Map';

        return new Weather($providerName, $temperature, $temperature_type);

    }
}