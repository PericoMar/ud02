<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pais</title>
</head>
<body>
    <?php
        $pais = $_GET["pais"];
        $nombre = $_GET["nombre"];
        echo "<h1>!" . $pais . "!</h1>";
        $paises_europeos = array(
            "España" => array("Madrid", "Barcelona", "Valencia", "Sevilla", "Bilbao"),
            "Francia" => array("París", "Marsella", "Lyon", "Toulouse", "Niza"),
            "Italia" => array("Roma", "Milán", "Nápoles", "Turín", "Florencia"),
            "Alemania" => array("Berlín", "Múnich", "Hamburgo", "Colonia", "Fráncfort"),
            "Reino Unido" => array("Londres", "Birmingham", "Mánchester", "Glasgow", "Liverpool"),
            "Portugal" => array("Lisboa", "Oporto", "Vila Nova de Gaia", "Amadora", "Braga"),
            "Holanda" => array("Ámsterdam", "Róterdam", "La Haya", "Utrecht", "Eindhoven"),
            "Bélgica" => array("Bruselas", "Amberes", "Gante", "Brujas", "Lovaina"),
            "Suiza" => array("Zúrich", "Ginebra", "Basilea", "Lausana", "Berna"),
            "Austria" => array("Viena", "Graz", "Linz", "Salzburgo", "Innsbruck"),
            "Suecia" => array("Estocolmo", "Gotemburgo", "Malmö", "Uppsala", "Linköping"),
            "Noruega" => array("Oslo", "Bergen", "Trondheim", "Stavanger", "Drammen"),
            "Dinamarca" => array("Copenhague", "Aarhus", "Odense", "Aalborg", "Esbjerg")
        );

    ?>
    <form method="post" action="">
        <label for="ciudad">Escoge una ciudad:</label>
        <select name="ciudad" id="ciudad">
            <?php
            foreach ($paises_europeos[$pais] as $ciudad) {
                echo "<option value='" . $ciudad . "'>" . $ciudad . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Seleccionar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ciudad = $_POST["ciudad"];
            header("Location: ciudad.php?ciudad=" . urlencode($ciudad) . "&nombre=" . urlencode($nombre));
        }
    ?>
</body>
</html>