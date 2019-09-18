<?php

namespace PitcheroWeather\Fixtures;

use PitcheroWeather\Contracts\FixtureTeamInterface;

class FixtureTeam implements FixtureTeamInterface
{
    /**
     * @var string
     */
    protected $home;
    
    /**
     * @var string
     */
    protected $away;

    /**
     * TeamFixture constructor.
     *
     * @param string $home
     * @param string $away
     */
    public function __construct(string $home, string $away)
    {
        $this->home = $home;
        $this->away = $away;
    }

    /**
     * Get the home team.
     * 
     * @return string
     */
    public function getHomeTeam(): string
    {
        return $this->home;
    }

    /**
     * Get the away team.
     * 
     * @return string
     */
    public function getAwayTeam(): string
    {
        return $this->away;
    }
}
