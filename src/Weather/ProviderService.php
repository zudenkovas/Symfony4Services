<?php

namespace App\Weather;

use App\ExternalApi\GoogleApi\WeatherService as GoogleWeatherService;
use App\ExternalApi\WeatherServiceInterface;
use App\ExternalApi\YahooApi\WeatherService as YahooWeatherService;

class ProviderService
{
    /** @var GoogleWeatherService */
    private $googleWeatherService;

    /** @var YahooWeatherService */
    private $yahooWeatherService;

    /**
     * ProviderService constructor.
     * @param GoogleWeatherService $googleWeatherService
     * @param YahooWeatherService  $yahooWeatherService
     */
    public function __construct(GoogleWeatherService $googleWeatherService, YahooWeatherService $yahooWeatherService)
    {
        $this->googleWeatherService = $googleWeatherService;
        $this->yahooWeatherService = $yahooWeatherService;
    }

    /**
     * @param \DateTime $day
     * @return WeatherServiceInterface
     */
    public function getWeatherProvider(\DateTime $day): WeatherServiceInterface
    {
        $weekday = $day->format('D');
        if ($weekday === 'Sat' || $weekday === 'Sun') {
            $service = $this->yahooWeatherService;
        } else {
            $service = $this->googleWeatherService;
        }

        return $service;
    }
}
