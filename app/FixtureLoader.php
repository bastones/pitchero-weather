<?php

namespace PitcheroWeather;

class FixtureLoader
{
    public function load(): array
    {
        $data = $this->loadDataFromFile();

        return array_map(function ($fixture) {
            return Fixture::fromArray($fixture);
        }, $data);
    }

    private function loadDataFromFile(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/../data/fixtures.json'), true);
    }
}
