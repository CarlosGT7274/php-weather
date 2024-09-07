<?php

class HistoryController {
    public function saveWeatherQuery($userId, $location, $weatherData) {
        $historyModel = new HistoryModel();
        $historyModel->saveQuery($userId, $location, $weatherData);
    }

    public function getHistoryByUserId($userId) {
        $historyModel = new HistoryModel();
        return $historyModel->getQueriesByUserId($userId);
    }
}
