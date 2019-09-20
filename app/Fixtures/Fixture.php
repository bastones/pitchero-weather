<?php

namespace PitcheroWeather\Fixtures;

use Carbon\CarbonInterface;
use PitcheroWeather\Contracts\CoordinatesInterface;
use PitcheroWeather\Contracts\FixtureTeamInterface;
use PitcheroWeather\Providers\OpenWeatherService;
use PitcheroWeather\Weather;

class Fixture
{
    /**
     * @var string
     */
    protected $location;
    
    /**
     * @var CoordinatesInterface
     */
    protected $coordinates;

    /**
     * @var FixtureTeamInterface
     */
    protected $team;
    
    /**
     * @var CarbonInterface
     */
    protected $kickoff;

    /**
     * Fixture constructor.
     *
     * @param string $location
     * @param CoordinatesInterface $coordinates
     * @param FixtureTeamInterface $team
     * @param CarbonInterface $kickoff
     */
    public function __construct(string $location, CoordinatesInterface $coordinates, FixtureTeamInterface $team, CarbonInterface $kickoff)
    {
        $this->location = $location;
        $this->coordinates = $coordinates;
        $this->team = $team;
        $this->kickoff = $kickoff;
    }

    /**
     * Get the location.
     * 
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * Get the weather.
     *
     * @return Weather
     */
    public function getWeather(): Weather
    {
        return new OpenWeatherService($this->coordinates);
    }

    /**
     * Get the team.
     * 
     * @return FixtureTeamInterface
     */
    public function getTeam(): FixtureTeamInterface
    {
        return $this->team;
    }

    /**
     * Get the kickoff.
     *
     * @return CarbonInterface
     */
    public function getKickoff()
    {
        return $this->kickoff;
    }
}
