<?php

namespace PitcheroWeather\Fixtures;

use PitcheroWeather\Fixtures\Contracts\FixtureLocationInterface;

class FixtureLocation implements FixtureLocationInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * FixtureLocation constructor.
     *
     * @param string $name
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(string $name, float $latitude, float $longitude)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Get the name.
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the latitude.
     * 
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Get the longitude.
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
