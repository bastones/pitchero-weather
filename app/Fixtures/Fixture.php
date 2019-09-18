<?php

namespace PitcheroWeather\Fixtures;

use Carbon\CarbonInterface;
use PitcheroWeather\Fixtures\Contracts\FixtureLocationInterface;
use PitcheroWeather\Fixtures\Contracts\FixtureTeamsInterface;

class Fixture
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var FixtureTeamsInterface
     */
    protected $teams;

    /**
     * @var FixtureLocationInterface
     */
    protected $location;
    
    /**
     * @var CarbonInterface
     */
    protected $kickoff;

    /**
     * Fixture constructor.
     *
     * @param int $id
     * @param FixtureTeamsInterface $teams
     * @param FixtureLocationInterface $location
     * @param CarbonInterface $kickoff
     */
    public function __construct(int $id, FixtureTeamsInterface $teams, FixtureLocationInterface $location, CarbonInterface $kickoff)
    {
        $this->id = $id;
        $this->teams = $teams;
        $this->location = $location;
        $this->kickoff = $kickoff;
    }

    /**
     * Get the ID.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the teams.
     * 
     * @return FixtureTeamsInterface
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Get the location.
     * 
     * @return FixtureLocationInterface
     */
    public function getLocation()
    {
        return $this->location;
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
