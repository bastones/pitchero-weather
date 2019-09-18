<?php

namespace PitcheroWeather\Fixtures;

use Carbon\Carbon;
use PitcheroWeather\Contracts\FixtureLoaderInterface;
use PitcheroWeather\Coordinates;

class FixtureLoader implements FixtureLoaderInterface
{
    /**
     * Load the fixture loader.
     *
     * @return array
     */
    public function load(): array
    {
        return array_map(function ($fixture) {
            $teams = new FixtureTeam($fixture['team']['home'], $fixture['team']['away']);
            $coordinates = new Coordinates($fixture['location']['lat'], $fixture['location']['lng']);
            $location = new FixtureLocation($fixture['location']['name'], $coordinates);
            $kickoff = new Carbon($fixture['kickoff']);

            return new Fixture($teams, $location, $kickoff);
        }, $this->getData());
    }

    /**
     * Get the fixture data.
     *
     * @return array
     */
    protected function getData(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/../../resources/data/fixtures.json'), true);
    }
}
