<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $number = isset($_GET['number']) ? htmlspecialchars($_GET['number']) : '';
        if(is_numeric($number)){
            for ($i = 1; $i <= 10; $i++) {
                echo $number . " x " . $i . " = " . $number * $i . "<br>";
            }
        } else {
            echo "Debes de introducir un numero.";
        }
    }
?>