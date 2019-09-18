<?php

require './vendor/autoload.php';

echo (new \PitcheroWeather\Application(new \PitcheroWeather\FixtureLoader()))->run();
