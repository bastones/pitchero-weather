<?php

namespace PitcheroWeather;

require './vendor/autoload.php';

echo Application::run(new Fixtures\FixtureLoader());
