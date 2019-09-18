<?php

namespace PitcheroWeather;

class Fixture
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $awayTeam;

    /**
     * @var string
     */
    private $homeTeam;

    /**
     * @var string
     */
    private $kickoff;

    /**
     * @var Location
     */
    private $location;

    /**
     * Fixture constructor.
     * @param int $id
     * @param string $awayTeam
     * @param string $homeTeam
     * @param string $kickoff
     * @param Location $location
     */
    public function __construct(int $id, string $awayTeam, string $homeTeam, string $kickoff, Location $location)
    {
        $this->id = $id;
        $this->awayTeam = $awayTeam;
        $this->homeTeam = $homeTeam;
        $this->kickoff = $kickoff;
        $this->location = $location;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['awayTeam'],
            $data['homeTeam'],
            $data['kickoff'],
            new Location(
                $data['location']['name'],
                $data['location']['lat'],
                $data['location']['lng']
            )
        );
    }

    public function id(): int
    {
        return $this->id;
    }

    public function awayTeam(): string
    {
        return $this->awayTeam;
    }

    public function homeTeam(): string
    {
        return $this->homeTeam;
    }

    public function kickoff(): string
    {
        return $this->kickoff;
    }

    public function location(): Location
    {
        return $this->location;
    }
}
