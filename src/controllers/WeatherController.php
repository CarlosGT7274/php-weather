<?php
// require_once '../models/HistoryModel.php';
require_once '/srv/http/php_prueba/src/models/HistoryModel.php';
require_once '/srv/http/php_prueba/src/services/WeatherService.php';

class WeatherController {
    private $weatherService;
    private $historyModel;

    public function __construct() {
        $this->weatherService = new WeatherService();
        $this->historyModel = new HistoryModel();
    }

    public function getWeather($location) {
        $weatherData = $this->weatherService->getWeather($location);
        return $weatherData;
    }

    public function saveWeatherQuery($userId, $location, $weatherData) {
        $this->historyModel->saveQuery($userId, $location, json_encode($weatherData));
    }
}

