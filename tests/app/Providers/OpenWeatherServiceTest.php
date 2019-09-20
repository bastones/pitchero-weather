<?php

use PHPUnit\Framework\TestCase;
use PitcheroWeather\Contracts\CoordinatesInterface;
use PitcheroWeather\Coordinates;
use PitcheroWeather\Providers\OpenWeatherService;

final class OpenWeatherServiceTest extends TestCase
{
    /**
     * Test the class is instantiable with a set of coordinates.
     *
     * @return void
     */
    public function test_class_is_instantiable_with_coordinates_instance()
    {
        $this->assertInstanceOf(OpenWeatherService::class, $this->getClassInstance());
    }

    /**
     * Test the getCurrentTemperature() method returns valid weather data on success.
     *
     * @return void
     */
    public function test_getCurrentTemperature_method_returns_valid_weather_data_on_success()
    {
        $data = $this->getClassInstance()->getCurrentTemperature();

        $this->assertIsArray($data);
        $this->assertIsArray($data['icon']);
        
        $this->assertArrayHasKey('temperature', $data);
        $this->assertArrayHasKey('icon', $data);

        $this->assertArrayHasKey('description', $data['icon']);
        $this->assertArrayHasKey('url', $data['icon']);
        
        $this->assertIsFloat($data['temperature']);
    }

    /**
     * Test the class is instantiable with a set of coordinates on failure.
     *
     * @return void
     */
    public function test_getCurrentTemperature_method_returns_null_on_failure()
    {
        $this->assertNull($this->getClassInstance(null, null, false)->getCurrentTemperature());
    }

    /**
     * Get a class instance.
     *
     * @param float|null $latitude
     * @param float|null $longitude
     * @param bool $performSuccessTest
     * @return FakeWeatherService
     */
    protected function getClassInstance(float $latitude = null, float $longitude = null, bool $performSuccessTest = true): FakeWeatherService
    {
        return new FakeWeatherService(
            new Coordinates($latitude ?? 53.551742, $longitude ?? -1.4703777),
            $performSuccessTest
        );
    }
}

final class FakeWeatherService extends OpenWeatherService
{
    /**
     * @var bool
     */
    protected $performSuccessfulTest;

    /**
     * FakeWeatherService constructor.
     *
     * @param CoordinatesInterface $coordinates
     * @param bool $performSuccessfulTest
     */
    public function __construct(CoordinatesInterface $coordinates, bool $performSuccessfulTest = true)
    {
        parent::__construct($coordinates);
        
        $this->performSuccessfulTest = $performSuccessfulTest;
    }

    /**
     * Override the method for testing.
     *
     * @return Object
     */
    protected function getForecastData()
    {
        return new class ($this->performSuccessfulTest)
        {
            /**
             * @var bool
             */
            protected $performSuccessfulTest;

            /**
             * Anonymous class.
             *
             * @param bool $performSuccessfulTest
             */
            public function __construct(bool $performSuccessfulTest)
            {
                $this->performSuccessfulTest = $performSuccessfulTest;
            }

            /**
             * Return the status code.
             *
             * @return int
             */
            public function getStatusCode()
            {
                return $this->performSuccessfulTest ? 200 : 401;
            }

            /**
             * Return the response data.
             *
             * @return string
             */
            public function getBody()
            {
                return new class
                {
                    /**
                     * Return the response data.
                     *
                     * @return string
                     */
                    public function getContents()
                    {
                        return json_encode([
                            'list' => [[
                                'main' => [
                                    'temp' => 25,
                                ],

                                'weather' => [[
                                    'description' => 'sunny',
                                    'icon' => 'test.png',
                                ]],
                            ]],
                        ]);
                    }
                };
            }
        };
    }
}
