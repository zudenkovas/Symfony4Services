<?php

namespace App\ExternalApi;

use App\Model\Weather;

interface WeatherServiceInterface
{
    /**
     * @param \DateTime $day
     * @return Weather
     * @throws \Exception
     */
    public function getDay(\DateTime $day): Weather;
}
