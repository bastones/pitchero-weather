<?php

namespace PitcheroWeather;

use PitcheroWeather\Fixtures\Contracts\FixtureLoaderInterface;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Application
{
    /**
     * Initialise the application.
     * 
     * @param FixtureLoaderInterface $fixtures
     * @return string
     */
    public static function run(FixtureLoaderInterface $fixtures)
    {
        return (new static)->getTwigEnvironment()->render('index.twig', [
            'fixtures' => $fixtures->load()
        ]);
    }

    /**
     * Get the Twig environment.
     * 
     * @return Environment
     */
    protected function getTwigEnvironment(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../resources/templates');
        
        return new Environment($loader);
    }
}
