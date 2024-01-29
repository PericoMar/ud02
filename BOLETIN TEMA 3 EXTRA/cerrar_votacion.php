<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            font-size: 24px;
            margin: 0;
            text-align: center;
        }

        h1 {
            margin: 32px 400px;
        }

        .form-inicio {
            margin: 0px 800px;
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
    <header>
        <h1>Votación para Jefe de Departamento</h1>
    </header>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jefeDepartamento = $_POST['empleado-primero'];
        $votosPrimero = $_POST['votos-primero'];
    }
    ?>
    <h1>El nuevo Jefe/a de Departamento es
        <?php echo $jefeDepartamento ?> con
        <?php echo $votosPrimero ?> voto/s
    </h1>

    <form action="inicio.php" class="form-inicio">
        <button class="btn btn-secondary">Volver al inicio</button>
    </form>

    <!-- Reseteo de los votos -->
    <?php
    $servername = "localhost";
    $username = "gestor_empleados";
    $password = "gestorGESTOR2";
    $dbname = "DEPARTAMENTOS";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $query = "UPDATE EMPLEADOS
                    SET VOTO = NULL;";
    $conn->query($query);
    ?>
    <footer>
        <p>&copy; 2024 Pedro Martínez González | Todos los derechos reservados</p>
    </footer>
</body>

</html>