<?php

namespace PitcheroWeather\Providers;

use Exception;
use PitcheroWeather\Weather;

class OpenWeatherService extends Weather
{
    /**
     * Get the current temperature.
     *
     * @return mixed
     */
    public function getCurrentTemperature()
    {
        $response = $this->getForecastData();

        if ((int) $response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());

            try {
                $today = $data->list[0];

                return [
                    'temperature' => round($today->main->temp),

                    'icon' => [
                        'description' => $today->weather[0]->description,
                        'url' => "https://openweathermap.org/img/wn/{$today->weather[0]->icon}.png",
                    ],
                ];
            } catch (Exception $e) {
                //
            }
        }

        return [
            'temperature' => null,
            'icon' => null,
        ];
    }

    /**
     * Get the forecast data.
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function getForecastData()
    {
        return $this->client->get('https://api.openweathermap.org/data/2.5/forecast', [
            'query' => [
                'units' => 'metric',
                'lat' => $this->coordinates->getLatitude(),
                'lon' => $this->coordinates->getLongitude(),
                'appid' => getenv('OPEN_WEATHER_API_KEY'),
            ],
        ]);
    }
}
