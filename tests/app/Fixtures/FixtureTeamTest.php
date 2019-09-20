<?php

use PHPUnit\Framework\TestCase;
use PitcheroWeather\Fixtures\FixtureTeam;

final class FixtureTeamTest extends TestCase
{
    /**
     * Test the class is instantiable.
     *
     * @return void
     * @throws Exception
     */
    public function test_class_is_instantiable()
    {
        $this->assertInstanceOf(FixtureTeam::class, $this->getClassInstance());
    }

    /**
     * Test the getHomeTeam() method returns the provided home team.
     *
     * @return void
     * @throws Exception
     */
    public function test_getHomeTeam_method_returns_provided_home_team()
    {
        $this->assertEquals('Brentford', $this->getClassInstance('Brentford')->getHomeTeam());
    }

    /**
     * Test the getAwayTeam() method returns the provided away team.
     *
     * @return void
     * @throws Exception
     */
    public function test_getAwayTeam_method_returns_provided_home_team()
    {
        $this->assertEquals('Birmingham City', $this->getClassInstance(null, 'Birmingham City')->getAwayTeam());
    }

    /**
     * Get a class instance.
     *
     * @param string|null $home
     * @param string|null $away
     * @return FixtureTeam
     * @throws Exception
     */
    protected function getClassInstance(string $home = null, string $away = null)
    {
        return new FixtureTeam($home ?? 'Barnsley', $away ?? 'Fulham');
    }
}
