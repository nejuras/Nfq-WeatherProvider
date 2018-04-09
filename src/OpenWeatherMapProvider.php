<?php

namespace Nfq\Weather;


class OpenWeatherMapProvider implements WeatherProviderInterface
{
    /**
     * @param Location $location
     * @return Weather
     */
    private $appid;

    /**
     * @param string $appid
     */
    public function __construct(string $appid)
    {
        $this->appid = $appid;
        //var_dump($this->appid);
    }

    public function fetch(Location $location):Weather
    {
        $url = "http://api.openweathermap.org/data/2.5/weather?lat={$location->lat}&lon={$location->lon}&appid=" . $this->appid;
        $json = file_get_contents($url);
        $data = json_decode($json);
        if ( ( json_last_error() ) || ( !$this->appid ) ) {

            throw new WeatherProviderException('klaida');
        }

        $temperature = $data->main->temp;
        $temperature_type = 'K';
        $providerName = 'Open Weather Map';

        return new Weather($providerName, $temperature, $temperature_type);

    }
}