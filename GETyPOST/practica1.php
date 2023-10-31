<!DOCTYPE html>
<html>
<head>
    <title>Conversión de Medidas</title>
</head>
<body>
    <h1>Conversión de Medidas</h1>
    <form method="post" action="conversion.php">
        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" required><br><br>

        <label for="unidad_origen">Unidad de Medida de Origen:</label>
        <select name="unidad_origen" id="unidad_origen">
            <option value="pulgadas">Pulgadas</option>
            <option value="pies">Pies</option>
            <option value="yardas">Yardas</option>
            <option value="millas">Millas</option>
        </select><br><br>

        <label for="unidad_destino">Unidad de Medida de Destino:</label>
        <select name="unidad_destino" id="unidad_destino">
            <option value="centimetros">Centímetros</option>
            <option value="metros">Metros</option>
            <option value="kilometros">Kilómetros</option>
        </select><br><br>

        <input type="submit" value="Convertir">
    </form>
</body>
</html>

