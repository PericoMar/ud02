<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .table-results{
            width:60%;
            margin:32px;
        }
        .form-cerrar{
            display:inline;
            margin-left:420px;
        }
        .form-inicio{
            display:inline;
            margin-left:32px;
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

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dniVotante = $_POST['dni-votante'];
            $dniCandidato = $_POST['dni-candidato'];
            $query = "UPDATE EMPLEADOS
                        SET VOTO = '$dniCandidato'
                        WHERE DNI = '$dniVotante';";
            $conn->query($query);
        }
    ?>
    <table class="table table-bordered table-hover table-results">
        <thead>
            <tr>
                <th>EMPLEADO</th>
                <th>VOTOS</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT CONCAT(E.NOMBRE , ' ' , E.APELLIDOS, ' (' , E.DNI , ')') AS EMPLEADO , COUNT(V.VOTO) AS VOTOS
                        FROM EMPLEADOS E
                        LEFT JOIN EMPLEADOS V ON E.DNI = V.VOTO
                        WHERE E.ES_CANDIDATO = 1
                        GROUP BY E.DNI
                        ORDER BY VOTOS DESC , E.NOMBRE ASC;";
            $result = $conn->query($query);
            // Recojo los datos del primero por separado para guardarme la variabble para 
            // saber si tengo que poner el boton de cierre de votos o no.
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $empleadoPrimero = $row['EMPLEADO'];
            $votosPrimero = $row['VOTOS'];
            ?>
                <tr>
                    <th><?php echo $empleadoPrimero ?></th>
                    <th><?php echo $votosPrimero ?></th>
                </tr>
            <?php
            $row = $result->fetch(PDO::FETCH_ASSOC);
            while($row){
                $empleado = $row['EMPLEADO'];
                $votos = $row['VOTOS'];
                ?>
                <tr>
                    <th><?php echo $empleado ?></th>
                    <th><?php echo $votos ?></th>
                </tr>
                <?php
                $row = $result->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        </tbody>
    </table>
    <?php
        if($votosPrimero){
            ?>
            <form action="cerrar_votacion.php" class="form-cerrar" method=post>
                <input type="hidden" value="<?php echo $empleadoPrimero ?>" name=empleado-primero>
                <input type="hidden" value=<?php echo $votosPrimero ?> name=votos-primero>
                <button class="btn btn-danger">Cerrar votaciones</button>
            </form>
            <?php
        }
    ?>
    <form action="inicio.php" class="form-inicio">
        <button class="btn btn-secondary">Volver al inicio</button>
    </form>
</body>
</html>