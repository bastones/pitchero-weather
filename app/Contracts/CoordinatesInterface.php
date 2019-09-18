<?php

namespace PitcheroWeather\Contracts;

interface CoordinatesInterface
{
    /**
     * Get the latitude.
     *
     * @return float
     */
    public function getLatitude(): float;

    /**
     * Get the longitude.
     *
     * @return float
     */
    public function getLongitude(): float;
}
