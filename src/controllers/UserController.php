<?php
require_once '../models/UserModel.php';

class UserController {
    public function login($username, $password) {
        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../views/dashboard.php");
            exit;
        } else {
            echo "Credenciales inválidas";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../../index.php");
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $userController = new UserController();
    $userController->login($username, $password);
}

if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    $userController = new UserController();
    $userController->logout();
}

