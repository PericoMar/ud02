<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="edad">Edad</label>
        <input type="text" name="edad">
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['edad'])){
                $edad = $_POST['edad'];
                if($edad >= 18){
                    echo "Eres mayor de edad"; 
                } else {
                    echo "No eres mayor de edad";
                }
            } else {
                echo "Debe rellenar el campo edad";
            }
        }
    ?>
</body>
</html>