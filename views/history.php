<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once '../src/controllers/WeatherController.php';
$weatherController = new WeatherController();
$history = $weatherController->getHistoryByUserId($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Consultas</title>
</head>
<body>
    <h1>Historial de Consultas del Clima</h1>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Ubicación</th>
            <th>Datos del Clima</th>
        </tr>
        <?php foreach ($history as $entry): ?>
        <tr>
            <td><?= $entry['created_at'] ?></td>
            <td><?= htmlspecialchars($entry['location']) ?></td>
            <td><?= htmlspecialchars($entry['weather_data']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

