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
            $city = $fixture['location']['name'];
            $coordinates = new Coordinates($fixture['location']['lat'], $fixture['location']['lng']);
            $team = new FixtureTeam($fixture['team']['home'], $fixture['team']['away']);
            $kickoff = new Carbon($fixture['kickoff']);

            return new Fixture($city, $coordinates, $team, $kickoff);
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
