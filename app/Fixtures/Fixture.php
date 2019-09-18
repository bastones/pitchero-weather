<?php

namespace PitcheroWeather\Fixtures;

use Carbon\CarbonInterface;
use PitcheroWeather\Fixtures\Contracts\FixtureLocationInterface;
use PitcheroWeather\Fixtures\Contracts\FixtureTeamInterface;

class Fixture
{
    /**
     * @var FixtureTeamInterface
     */
    protected $team;

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
     * @param FixtureTeamInterface $team
     * @param FixtureLocationInterface $location
     * @param CarbonInterface $kickoff
     */
    public function __construct(FixtureTeamInterface $team, FixtureLocationInterface $location, CarbonInterface $kickoff)
    {
        $this->team = $team;
        $this->location = $location;
        $this->kickoff = $kickoff;
    }

    /**
     * Get the team.
     * 
     * @return FixtureTeamInterface
     */
    public function getTeam()
    {
        return $this->team;
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
