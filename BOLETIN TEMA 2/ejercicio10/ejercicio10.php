<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="red" >Rojo</label>
        <input type="radio" name="color" value="red">
        <br>
        <label for="green">Blue</label>
        <input type="radio" name="color" value="green">
        <br>
        <label for="blue">Azul</label>
        <input type="radio" name="color" value="blue">
        <br>
        <label for="yellow">Amarillo</label>
        <input type="radio" name="color" value="yellow">
        <br>
        <button action="submit">Enviar</button>
    </form>
    <?php
    $colores = ['red' => 'rojo' , 'green' => 'verde' , 'blue' => 'azul' , 'yellow' => 'amarillo'];
        if(isset($_GET['color'])){
            $color = $_GET['color'];
            echo "<h1 style='color:".$color."'>Has elegido el color ".$colores[$color].". </h1>";
        }
    ?>
</body>
</html>