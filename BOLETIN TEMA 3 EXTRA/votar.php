<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .encabezado{
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <!-- Lista de empleados que no hayan votado (Que no tengan relleno el campo VOTO) -->
    <!-- Pulsan iniciar votacion y se redirije a una tabla de empleados(ES_CANDIDATO) con botones al lado: -->
    <!-- Redirije a la lista de empleados(ES_CANDIDATO) con la COUNT() de los votos. -->
    <!-- Si el Primero en votos tiene > 0 aparece el boton (cerrar votacion), sino no. -->
    <?php
        $servername = "localhost";
        $username = "gestor_empleados";
        $password = "gestorGESTOR2";
        $dbname = "DEPARTAMENTOS";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    ?>

    <form action="resultados.php" method=post>
        <table class="table table-bordered table-hover">
            <thead class="encabezado">
                <tr>
                    <th>Empleado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT CONCAT(NOMBRE , ' ' , APELLIDOS, ' (' , DNI , ')') AS EMPLEADO , DNI
                    FROM EMPLEADOS
                    WHERE ES_CANDIDATO;";
                    $result = $conn->query($query);
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        $empleado = $row['EMPLEADO'];
                        $dni = $row['DNI'];
                        ?>
                        <tr>
                            <th><?php echo $empleado ?></th>
                            <th><button class="btn btn-success" value=<?php echo $dni ?>>VOTAR</button></th>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            ?>
            <input type="hidden" name=dni-votante value=<?php echo $_POST['dni-votante']?>> 
            <?php
        }
        ?>
    </form>
</body>
</html>