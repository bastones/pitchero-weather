<?php

namespace PitcheroWeather\Fixtures\Contracts;

interface FixtureLocationInterface
{
    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string;
    
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
