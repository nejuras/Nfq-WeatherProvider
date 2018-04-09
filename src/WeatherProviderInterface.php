<?php

namespace Nfq\Weather;

interface WeatherProviderInterface
{
    /**
     * @param Location $location
     * @return Weather
     */
    public function fetch(Location $location):Weather;

}