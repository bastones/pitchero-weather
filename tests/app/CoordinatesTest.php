<?php

use PHPUnit\Framework\TestCase;
use PitcheroWeather\Coordinates;

final class CoordinatesTest extends TestCase
{
    /**
     * Test the class is instantiable with a set of coordinates.
     * 
     * @return void
     */
    public function test_class_is_instantiable_with_coordinates()
    {
        $this->assertInstanceOf(Coordinates::class, $this->getClassInstance());
    }

    /**
     * Test the getLatitude() method returns the same coordinate.
     * 
     * @return void
     */
    public function test_getLatitude_method_returns_same_coordinate()
    {
        $latitude = 51.4872912;
        
        $this->assertEquals(
            $latitude,
            $this->getClassInstance($latitude)->getLatitude()
        );
    }

    /**
     * Test the getLongitude() method returns the same coordinate.
     *
     * @return void
     */
    public function test_getLongitude_method_returns_same_coordinate()
    {
        $longitude = -0.3036014;
        
        $this->assertEquals(
            $longitude,
            $this->getClassInstance(null, $longitude)->getLongitude()
        );
    }

    /**
     * Get a class instance.
     *
     * @param float|null $latitude
     * @param float|null $longitude
     * @return Coordinates
     */
    protected function getClassInstance(float $latitude = null, float $longitude = null)
    {
        return new Coordinates($latitude ?? 53.551742, $longitude ?? -1.4703777);
    }
}
