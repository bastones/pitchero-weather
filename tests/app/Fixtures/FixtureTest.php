<?php

use Carbon\Carbon;
use Carbon\CarbonInterface;
use PHPUnit\Framework\TestCase;
use PitcheroWeather\Contracts\FixtureTeamInterface;
use PitcheroWeather\Coordinates;
use PitcheroWeather\Fixtures\Fixture;
use PitcheroWeather\Fixtures\FixtureTeam;
use PitcheroWeather\Weather;

final class FixtureTest extends TestCase
{
    /**
     * Test the class is instantiable.
     *
     * @return void
     * @throws Exception
     */
    public function test_class_is_instantiable()
    {
        $this->assertInstanceOf(Fixture::class, $this->getClassInstance());
    }
    
    /**
     * Test the getLocation() method returns the provided location.
     *
     * @return void
     * @throws Exception
     */
    public function test_getLocation_method_returns_provided_city()
    {
        $this->assertEquals('Liberty Stadium', $this->getClassInstance('Liberty Stadium')->getLocation());
    }
    
    /**
     * Test the getWeather() method returns a Weather object.
     *
     * @return void
     * @throws Exception
     */
    public function test_getWeather_method_returns_weather_object()
    {
        $this->assertInstanceOf(Weather::class, $this->getClassInstance('Liberty Stadium')->getWeather());
    }
    
    /**
     * Test the getTeam() method returns a FixtureTeam object.
     *
     * @return void
     * @throws Exception
     * @see tests/FixtureTeamTest.php
     */
    public function test_getTeam_method_returns_FixtureTeam_object()
    {
        $instance = $this->getClassInstance(null, null, new FixtureTeam('Brentford', 'Birmingham City'));
        
        $this->assertInstanceOf(FixtureTeam::class, $instance->getTeam());
    }
    
    /**
     * Test the getKickoff() method returns a Carbon object.
     *
     * @return void
     * @throws Exception
     */
    public function test_getKickoff_method_returns_Carbon_object()
    {        
        $this->assertInstanceOf(Carbon::class, $this->getClassInstance()->getKickoff());
    }
    
    /**
     * Test the getKickoff() method returns the same timestamp as provided.
     *
     * @return void
     * @throws Exception
     */
    public function test_getKickoff_method_returns_correct_timestamp()
    {
        $instance = $this->getClassInstance(null, null, null, new Carbon('09:00'));
        
        $this->assertEquals((new Carbon('09:00'))->format('H:i'), $instance->getKickoff()->format('H:i'));
    }

    /**
     * Get a class instance.
     *
     * @param string|null $city
     * @param Coordinates|null $coordinates
     * @param FixtureTeamInterface|null $team
     * @param CarbonInterface|null $kickoff
     * @return Fixture
     * @throws Exception
     */
    protected function getClassInstance(string $city = null, Coordinates $coordinates = null, FixtureTeamInterface $team = null, CarbonInterface $kickoff = null)
    {
        return new Fixture(
            $city ?? 'Oakwell',
            $coordinates ?? new Coordinates(53.551742, -1.4703777),
            $team ?? new FixtureTeam('Barnsley', 'Fulham'),
            $kickoff ?? new Carbon('15:00')
        );
    }
}
