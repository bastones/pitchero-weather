<?php

namespace PitcheroWeather\Fixtures\Contracts;

interface FixtureTeamInterface
{
    /**
     * TeamFixture constructor.
     *
     * @param string $home
     * @param string $away
     */
    public function __construct(string $home, string $away);

    /**
     * Get the home team.
     *
     * @return string
     */
    public function getHomeTeam(): string;

    /**
     * Get the away team.
     *
     * @return string
     */
    public function getAwayTeam(): string;
}
