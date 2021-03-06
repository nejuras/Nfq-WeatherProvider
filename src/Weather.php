<?php

namespace Nfq\Weather;

class Weather
{
    public $providerName;
    public $temperature;
    protected $type;

    /**
     * @param $providerName
     * @param $temperature
     * @param $type
     */
    public function __construct($providerName, $temperature, $type)
    {
        $this->providerName = $providerName;
        $this->type = $type;
        $this->temperature = $this->providerTemperatureType($temperature);
    }

    public function providerTemperatureType($temperature) {
        if ($this->type === 'F') {
            return $this->FahrenheitToCelsius($temperature);
        } else {
            return $this->KelvinToCelsius($temperature);
        }
    }

    public function KelvinToCelsius($temperature) {
        //Kelvin
        return round((int)$temperature - 273.15);
    }

    public function FahrenheitToCelsius($temperature) {
        //Fahrenheit
        return round(((int)$temperature - 32) * 5 / 9);
    }
}