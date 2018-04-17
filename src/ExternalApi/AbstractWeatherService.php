<?php

namespace App\ExternalApi;

use App\Model\NullWeather;
use App\Model\Weather;

class AbstractWeatherService
{
    /**
     * @param \DateTime $day
     * @return Weather
     * @throws \Exception
     */
    public function getDay(\DateTime $day): Weather
    {
        $today = $this->load(new NullWeather());
        $today->setDate($day);

        return $today;
    }

    /**
     * @param Weather $before
     * @return Weather
     * @throws \Exception
     */
    private function load(Weather $before): Weather
    {
        $now = new Weather();
        $base = $before->getDayTemp();
        $now->setDayTemp(random_int(5 - $base, 5 + $base));
        $base = $before->getNightTemp();
        $now->setNightTemp(random_int(-5 - abs($base), -5 + abs($base)));
        $now->setSky(random_int(1, 3));

        return $now;
    }
}
