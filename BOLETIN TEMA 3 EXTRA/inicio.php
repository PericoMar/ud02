<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
            text-align: center;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            font-size: 24px;
            margin: 0;
            text-align: center;
        }

        main {
            margin: 128px 800px;
        }

        .select-empleados {
            width: 35%;
            margin-bottom: 20px;
        }

        .form-empleados {
            display: inline;
        }

        .form-results {
            display: inline;
            margin-left: 5px;
        }

        .input-datalist {
            width: 100%;
            margin-bottom: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Lista de empleados que no hayan votado (Que no tengan relleno el campo VOTO) -->
    <!-- Pulsan iniciar votacion y se redirije a una tabla de empleados(ES_CANDIDATO && NO EL MISMO) con botones al lado: -->
    <!-- Redirije a resultados y suma el voto, aparece la lista de empleados(ES_CANDIDATO) con la COUNT() de los votos. -->
    <!-- Si el Primero en votos tiene > 0 aparece el boton (cerrar votacion), sino no. -->

    <?php
    try{
    $servername = "localhost";
    $username = "gestor_empleados";
    $password = "gestorGESTOR2";
    $dbname = "DEPARTAMENTOS";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $query = "SELECT CONCAT(NOMBRE , ' ' , APELLIDOS) AS EMPLEADO , DNI 
                            FROM EMPLEADOS
                            WHERE VOTO IS NULL;";
    $result = $conn->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        ?>

        <header>
            <h1>Votación para Jefe de Departamento</h1>
        </header>

        <main>
            <h1>¿Quién eres?</h1>
            <form action="votar.php" method=post class=form-empleados>
                <input list="empleados" name=dni-votante class="form-control input-datalist" placeholder="Nombre o DNI">
                <datalist id="empleados">
                    <?php
                    while ($row) {
                        $empleado = $row['EMPLEADO'];
                        $dni = $row['DNI'];
                        ?>
                        <option value="<?php echo $dni ?>">
                            <?php echo $empleado ?>
                        </option>
                        <?php
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </datalist>
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
    </main>
    <?php
        }catch(PDOException $e){    
            ?>
            <h1>Error con la conexión a la base de datos. Asegurate de estar conectado</h1>
            <h3><?php echo $e->getMessage(); ?></h3>
            <?php
        }
    ?>
    <footer>
        <p>&copy; 2024 Pedro Martínez González | Todos los derechos reservados</p>
    </footer>
</body>

</html>