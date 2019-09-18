<?php

namespace PitcheroWeather\Contracts;

interface FixtureLoaderInterface
{
    /**
     * Load the fixture loader.
     *
     * @return array
     */
    public function load(): array;
}
