<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_name = isset($_GET['user_name']) ? htmlspecialchars($_GET['user_name']) : '';
        $user_email = isset($_GET['user_email']) ? htmlspecialchars($_GET['user_email']) : '';

        if (!empty($user_name) && !empty($user_email)) {
            echo "Bienvenido";
        } else {
            if (empty($user_name)) {
                echo "Debe rellenar el campo del nombre </br>";
            }
            if (empty($user_email)) {
                echo "Debe rellenar el campo del email";
            }
        }
    }
?>