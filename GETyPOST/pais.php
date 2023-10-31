<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pais</title>
</head>
<body>
    <?php
        //Recogemos el pais y el nombre del usuario desde la URL por el metodo GET
        $pais = $_GET["pais"];
        $nombre = $_GET["nombre"];
        echo "<h1>!" . $pais . "!</h1>";
        //Cargamos el array de las ciudades
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
        //Función para escoger la ciudad:
        function generarSelectCiudades($paises_europeos, $pais){
            //Se crea el select con las ciudades del pais seleccionado
            echo "<select name='ciudad' id='ciudad'>";
            foreach ($paises_europeos[$pais] as $ciudad) {
                echo "<option value='" . $ciudad . "'>" . $ciudad . "</option>";
            }
            echo "</select>";
        }
    ?>
    <!-- Creamos el nuevo formulario y lo cargamos de la misma manera -->
    <form method="post" action="">
        <label for="ciudad">Escoge una ciudad:</label>
            <?php
            generarSelectCiudades($paises_europeos, $pais)
            ?>
        <input type="submit" value="Seleccionar">
    </form>
    <?php
        //Si el metodo de envio es POST, se recoge la ciudad seleccionada y se redirige a la pagina ciudad.php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ciudad = $_POST["ciudad"];
            header("Location: ciudad.php?ciudad=" . urlencode($ciudad) . "&nombre=" . urlencode($nombre));
        }
    ?>
</body>
</html>