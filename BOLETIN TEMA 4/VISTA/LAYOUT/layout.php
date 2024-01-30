<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (tu código CSS y otros encabezados) -->
    <link rel="stylesheet" href="../VISTA/LAYOUT/layout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title><?php include($title) ?></title>
</head>
<body>
    <header>
        <h1>Listado de Productos</h1>
    </header>
    <main>
        <?php include($content); ?>
    </main>
    <footer>
        <p>&copy; 2024 Pedro Martínez González | Todos los derechos reservados</p>
    </footer>
</body>
</html>
