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
            <option value="suma">Sumar</option>
            <option value="resta">Restar</option>
            <option value="multiplicacion">Multiplicar</option>
            <option value="division">Dividir</option>
        </select>
        <button action="submit">Enviar</button>
    </form>
    <?php
    $operaciones = [
        'suma' => function($a, $b) { return $a + $b; },
        'resta' => function($a, $b) { return $a - $b; },
        'multiplicacion' => function($a, $b) { return $a * $b;},
        'division' => function($a, $b) {
            if($b == 0){
                throw new Exception('No se puede dividir por cero.');
            }
            return $a/$b;
        }
    ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $number1 = isset($_POST['number1']) ? $_POST['number1'] : '';
            $number2 = isset($_POST['number2']) ? $_POST['number2'] : '';
            $operacion = $operaciones[$_POST['operacion']];
            try{
                $resultado = $operacion($number1,$number2);
                echo "El resultado a la " , $_POST['operacion'], " de ",$number1," y ",$number2, " es: ",$resultado;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

    ?>
</body>

</html>