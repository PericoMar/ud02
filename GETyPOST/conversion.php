<!DOCTYPE html>
<html>
<head>
    <title>Resultado de Conversión</title>
</head>
<body>
    <h1>Resultado de Conversión</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = floatval($_POST["valor"]);
        $unidad_origen = $_POST["unidad_origen"];
        $unidad_destino = $_POST["unidad_destino"];
        function cambioAlSistemaMetricoDecimal($valor, $unidad_origen, $unidad_destino) {
            $factores = [
                "pulgadas" => ["centimetros" => 2.54, "metros" => 0.0254, "kilometros" => 0.0000254],
                "pies" => ["centimetros" => 30.48, "metros" => 0.3048, "kilometros" => 0.0003048],
                "yardas" => ["centimetros" => 91.44, "metros" => 0.9144, "kilometros" => 0.0009144],
                "millas" => ["centimetros" => 160934, "metros" => 1609.34, "kilometros" => 1.60934]
            ];
            $resultado = $valor * $factores[$unidad_origen][$unidad_destino];
            return $resultado;
        }
        function cambioDecimal($valor,$unidad_origen,$unidad_destino){
            if($unidad_origen == "centimetros"){
                if($unidad_destino == "centimetros"){
                    $resultado = $valor;
                }elseif($unidad_destino == "metros"){
                    $resultado = $valor/100;
                }elseif($unidad_destino == "kilometros"){
                    $resultado = $valor/100000;
                }elseif($unidad_destino == "decimetros"){
                    $resultado = $valor/10;
                }elseif($unidad_destino == "milimetros"){
                    $resultado = $valor*10;
                }elseif($unidad_destino == "micrometros"){
                    $resultado = $valor*10000;
                }
            }
            return $resultado;
        }

        echo "$valor $unidad_origen = $resultado $unidad_destino";
    }
    ?>
</body>
</html>

