<?php

namespace PitcheroWeather\Fixtures;

use PitcheroWeather\Contracts\CoordinatesInterface;
use PitcheroWeather\Contracts\FixtureLocationInterface;

class FixtureLocation implements FixtureLocationInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var CoordinatesInterface
     */
    protected $coordinates;

    /**
     * FixtureLocation constructor.
     *
     * @param string $name
     * @param CoordinatesInterface $coordinates
     */
    public function __construct(string $name, CoordinatesInterface $coordinates)
    {
        $this->name = $name;
        $this->coordinates = $coordinates;
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
     * Get the coordinates.
     * 
     * @return CoordinatesInterface
     */
    public function getCoordinates(): CoordinatesInterface
    {
        return $this->coordinates;
    }
}
