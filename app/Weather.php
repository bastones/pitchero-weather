<?php

namespace PitcheroWeather;

use GuzzleHttp\Client;
use PitcheroWeather\Contracts\CoordinatesInterface;

abstract class Weather
{
    /**
     * @var CoordinatesInterface
     */
    protected $coordinates;
    
    /**
     * @var Client
     */
    protected $client;

    /**
     * Weather constructor.
     *
     * @param CoordinatesInterface $coordinates
     */
    public function __construct(CoordinatesInterface $coordinates)
    {
        $this->coordinates = $coordinates;

        $this->client = new Client();
    }

    /**
     * Get the current temperature.
     * 
     * @return mixed
     */
    abstract public function getCurrentTemperature();
}
