<?php
require_once '/srv/http/php_prueba/src/services/WeatherService.php';
require_once '/srv/http/php_prueba//src/controllers/WeatherController.php';
$weatherController = new WeatherController();


$location = 'mexico';
$weatherData = $weatherController->getWeather($location);
$weatherController->saveWeatherQuery($_SESSION['user_id'], $location, $weatherData);

