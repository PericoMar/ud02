<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
        width: 100%;
        border: 1px solid #000;
        }
        th, td {
        width: 25%;
        text-align: left;
        vertical-align: top;
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 0.3em;
        caption-side: bottom;
        }
        caption {
        padding: 0.3em;
        color: #fff;
            background: #000;
        }
        th {
        background: #eee;
        }
</style>
</head>
<body>
<table class="numeros">

<tr>
  <td>Numero</td>
  <td>Doble</td>
  <td>Cuadrado</td>
  <td>Raiz</td>
</tr>
<?php
    for($i=1;$i<=10;$i++){
        $doble=$i*2;
        $cuadrado=$i**2;
        $raiz=sqrt($i);
        echo "<tr><td>$i</td><td>$doble</td><td>$cuadrado</td><td>  $raiz</td></tr>";
    }
?>
</table>
</body>
</html>