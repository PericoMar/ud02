<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="number">Number 1: </label>
        <input type="text" name="number1" />
        <label for="number">Number 2: </label>
        <input type="text" name="number2" />
        <select name="operacion" id="operacion">
            <option value="Sumar">Sumar</option>
            <option value="Restar">Restar</option>
            <option value="Multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>
        <button action="submit">Enviar</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $number1 = empty($_POST['number1']) ? $_POST['number1'] : '';
            $number2 = empty($_POST['number2']) ? $_POST['number2'] : '';
            
        }

    ?>
</body>

</html>