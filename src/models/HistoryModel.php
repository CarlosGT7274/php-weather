<?php
require_once '../config/database.php';

class HistoryModel {
    public function saveQuery($userId, $location, $weatherData) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO weather_history (user_id, location, weather_data) VALUES (:user_id, :location, :weather_data)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':weather_data', $weatherData);
        return $stmt->execute();
    }

    public function getQueriesByUserId($userId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM weather_history WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

