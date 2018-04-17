<?php

namespace App\ExternalApi\YahooApi;

use App\ExternalApi\AbstractWeatherService;
use App\ExternalApi\WeatherServiceInterface;
use App\Model\Weather;

class WeatherService extends AbstractWeatherService implements WeatherServiceInterface
{
    public const PROVIDER_NAME = 'Yahoo';

    /**
     * @param \DateTime $day
     * @return Weather
     * @throws \Exception
     */
    public function getDay(\DateTime $day): Weather
    {
        $today = parent::getDay($day);
        $today->setProvider(self::PROVIDER_NAME);

        return $today;
    }
}
