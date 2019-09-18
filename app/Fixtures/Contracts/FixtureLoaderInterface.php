<?php

namespace PitcheroWeather\Fixtures\Contracts;

interface FixtureLoaderInterface
{
    /**
     * Load the fixture loader.
     *
     * @return array
     */
    public function load(): array;
}
