<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once '../src/controllers/WeatherController.php';
$weatherController = new WeatherController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location = $_POST['location'];
    $weatherData = $weatherController->getWeather($location);
    $weatherController->saveWeatherQuery($_SESSION['user_id'], $location, $weatherData);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Consulta el Clima</h1>
    <form action="dashboard.php" method="POST">
        <input type="text" name="location" placeholder="Ciudad" required>
        <button type="submit">Consultar</button>
    </form>

  
    <?php if (isset($weatherData)): ?>
        <h2>Clima en <?= htmlspecialchars($location) ?></h2>
        <p>Temperatura: <?= $weatherData['main']['temp'] ?> °C</p>
        <p>Descripción: <?= $weatherData['weather'][0]['description'] ?></p>
    <?php endif; ?>
    <a href="../src/controllers/UserController.php?logout=true">Cerrar Sesión</a>    
</body>
</html>

