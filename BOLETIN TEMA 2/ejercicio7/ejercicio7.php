<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="numbers">Numeros separados por comas:</label>
        <input type="text" name="numbers">
        <button action="submit">Sumar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numbers = isset($_POST['numbers']) ? $_POST['numbers'] : '';
        if (preg_match("/^\d+([ ]?,[ ]?\d+)*$/", $numbers)) {
            $numbersArray = explode(',', $numbers); // Dividir la cadena en un array usando la coma como delimitador
            $sum = 0;
            foreach ($numbersArray as $num) {
                $sum += (int) $num; // Sumar cada número convertido a entero
            }
            echo "La suma de los números es: $sum";
        } else {
            echo "Formato erroneo";
        }
    }
    ?>
</body>

</html>