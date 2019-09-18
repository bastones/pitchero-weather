<?php

namespace PitcheroWeather\Contracts;

interface FixtureLocationInterface
{
    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string;
    
    /**
     * Get the coordinates.
     *
     * @return CoordinatesInterface
     */
    public function getCoordinates(): CoordinatesInterface;
}
