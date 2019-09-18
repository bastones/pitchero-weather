<?php

namespace PitcheroWeather;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Application
{
    /**
     * @var FixtureLoader
     */
    private $fixtureLoader;

    public function __construct(FixtureLoader $fixtureLoader)
    {
        $this->fixtureLoader = $fixtureLoader;
    }

    public function run(): string
    {
        $twig = $this->initialiseTwig();
        $fixtures = $this->fixtureLoader->load();
        return $twig->render('index.twig', ['fixtures' => $fixtures]);
    }

    private function initialiseTwig(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        return new Environment($loader);
    }
}
