<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            margin:32px 600px;
        }
        .select-empleados{
            width:35%;
            margin-bottom:20px;
        }
        .form-empleados{
            display:inline;
        }
        .form-results{
            display:inline;
        }
    </style>
</head>
<body>
    <!-- Lista de empleados que no hayan votado (Que no tengan relleno el campo VOTO) -->
    <!-- Pulsan iniciar votacion y se redirije a una tabla de empleados(ES_CANDIDATO && NO EL MISMO) con botones al lado: -->
    <!-- Redirije a resultados y suma el voto, aparece la lista de empleados(ES_CANDIDATO) con la COUNT() de los votos. -->
    <!-- Si el Primero en votos tiene > 0 aparece el boton (cerrar votacion), sino no. -->

    <?php
        $servername = "localhost";
        $username = "gestor_empleados";
        $password = "gestorGESTOR2";
        $dbname = "DEPARTAMENTOS";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $query = "SELECT CONCAT(NOMBRE , ' ' , APELLIDOS, ' (' , DNI , ')') AS EMPLEADO , DNI 
                            FROM EMPLEADOS
                            WHERE VOTO IS NULL;";
                $result = $conn->query($query);
                $row = $result->fetch(PDO::FETCH_ASSOC);
        if($row){
    ?>

    <h1>¿Quién eres?</h1>
    <form action="votar.php" method=post class=form-empleados>
        <select name=dni-votante class="form-select select-empleados">
            <?php
                    while($row){
                        $empleado = $row['EMPLEADO'];
                        $dni = $row['DNI'];
                        ?>
                        <option value="<?php echo $dni ?>" ><?php echo $empleado ?></option>
                        <?php
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                    }
            ?>
        </select>
        <button class="btn-votar btn btn-primary">Iniciar votación</button>   
    </form>
    <?php
        } else {
            ?>
            <h1>Todos los empleados han votado.</h1>
            <?php
        }
    ?>
    <form action="resultados.php" class=form-results>
        <button class="btn btn-primary">Ver resultados</button>
    </form>
</body>
</html>