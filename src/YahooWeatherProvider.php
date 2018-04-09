<?php

namespace Nfq\Weather;

class YahooWeatherProvider implements WeatherProviderInterface
{
    /**
     * @param Location $location
     * @return Weather
     * @throws WeatherProviderException
     */
    public function fetch(Location $location):Weather
    {
        $q = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) 
          where text="Vilnius, lt")';
        $url ="https://query.yahooapis.com/v1/public/yql?q=" . urlencode($q) . "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
        $url_into_string= file_get_contents($url);
        $data = json_decode($url_into_string);

        if (json_last_error()) {

            throw new WeatherProviderException('klaida');
        }

        $temperature = $data->query->results->channel->item->condition->temp;
        $temperature_type = $data->query->results->channel->units->temperature;
        $provider_name = $data->query->results->channel->title;

        return new Weather($provider_name, $temperature, $temperature_type);
    }
}