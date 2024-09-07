<?php 

class WeatherService {
    private $apiKey = "3a7edebf0d21943e915be8086cb6a8cd";

    public function getWeather($location) {
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$this->apiKey}&units=metric";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
