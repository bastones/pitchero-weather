# Pitchero Web Developer Technical Test
 
The aim of the test is to enhance the data in the application with data from a Weather API.

Currently the application displays a list of fixtures for the day, the data we have for this fixture includes the geographical co-ordinates of the venue. This data can be used to the current weather from the OpenWeatherMap API.

The output of the page should be updated to include the temperature for each location along with the relative icon for the weather condition e.g. `drizzle`.

![Output](output.png)

## Requirements
- Temperature should be rounded to the nearest degree Celsius.
- Should an API call fail the fixture should show without weather data.
- Should more than one weather condition be returned then only the first one should be displayed.
- Your API code should be unit tested, including (but not limited to) the above conditions.

## API Documentation

The API documentation can be found here: https://openweathermap.org/api

Details on the weather conditions and related icons can be found here: https://openweathermap.org/weather-conditions

A free API key can be obtained by registering on their website.

## Installation

Run `composer install` to install the project’s dependencies.
### Running the application

You can start the server with the command `php -S localhost:8000` then view it in your browser at http://localhost:8000/ 
 