<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            margin: 10px;
        }
    </style>
</head>

<body>
    <h1>Agenda</h1>
    <table class="table table-secondary" style="width:50%">

        <?php        
        session_start();
        
        if (!isset($_SESSION['agenda'])) {
            $_SESSION['agenda'] = [];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['name']) || empty($_POST['name'])) {
                echo "<h3>Debe rellenar el campo de nombre<h3>";
            } elseif (isset($_POST['telephone'])) {
                $nombre = $_POST['name'];
                $telefono = $_POST['telephone'];
                if (!empty($telefono)) {
                    $_SESSION['agenda'][$nombre] = $telefono;
                } else {
                    unset($_SESSION['agenda'][$nombre]);
                }
            }
        }

        if (!empty($_SESSION['agenda'])) {
            echo "<thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Telefono</td>
                      </tr>
                 </thead>
                 <tbody class'table-group-divider'>";
            foreach ($_SESSION['agenda'] as $nombre => $telefono) {
                echo "<tr>
                            <td>$nombre</td>
                            <td>$telefono</tr>
                         </tr>
                    </tbody>";
            }
        }

        ?>
    </table>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="name">Nombre: </label>
        <input type="text" name="name">
        <label for="telephone">Telefono: </label>
        <input type="text" name="telephone">
        <button type="submit">Agregar a la agenda</button>
    </form>
</body>

</html>