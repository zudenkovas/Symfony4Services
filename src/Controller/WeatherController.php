<?php

namespace App\Controller;

use App\Model\NullWeather;
use App\Weather\LoaderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\SimpleCache\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use App\DateValidator\DateValidator;

class WeatherController extends AbstractController
{
    /**
     * @param               $day
     * @param LoaderService $weatherLoader
     * @param DateValidator $dateValidator
     * @return Response
     * @throws InvalidArgumentException
     */
    public function index($day, LoaderService $weatherLoader, DateValidator $dateValidator): Response
    {
        $validDay = $dateValidator->validateDate($day);

        try {
            $weather = $weatherLoader->loadWeatherByDay(new \DateTime($validDay));
        } catch (\Exception $exp) {
            $weather = new NullWeather();
        }

        return $this->render('weather/index.html.twig', [
            'weatherData' => [
                'date'      => $weather->getDate()->format('Y-m-d'),
                'dayTemp'   => $weather->getDayTemp(),
                'nightTemp' => $weather->getNightTemp(),
                'sky'       => $weather->getSky(),
                'provider'  => $weather->getProvider()
            ],
        ]);
    }
}
