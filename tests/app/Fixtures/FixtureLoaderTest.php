<?php

use PHPUnit\Framework\TestCase;
use PitcheroWeather\Fixtures\Fixture;
use PitcheroWeather\Fixtures\FixtureLoader;

final class FixtureLoaderTest extends TestCase
{
    /**
     * Test the class is instantiable.
     *
     * @return void
     */
    public function test_class_is_instantiable()
    {
        $this->assertInstanceOf(FixtureLoader::class, $this->getClassInstance());
    }
    
    /**
     * Test the load() method returns an array.
     *
     * @return void
     */
    public function test_load_method_returns_array()
    {
        $this->assertIsArray($this->getClassInstance()->load());
    }
    
    /**
     * Test the load() method returns an array of 'Fixture' objects.
     *
     * @return void
     */
    public function test_load_method_returns_array_of_fixture_objects()
    {
        $array = $this->getClassInstance()->load();
        
        foreach ($array as $item) {
            $this->assertInstanceOf(Fixture::class, $item);
        }
    }

    /**
     * Get a class instance.
     *
     * @return FixtureLoader
     */
    protected function getClassInstance()
    {
        return new FixtureLoader();
    }
}
