<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./VISTA/LAYOUT/layout.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedro Pizza</title>
</head>

<body>
    <header>
        <?php include($header); ?>
    </header>
    <main>
        <section>
            <?php include($content); ?>
        </section>
    </main>
    <footer>
        <p>&copy;
            <?php echo date('Y'); ?> Pedro Pizza | Todos los derechos reservados
        </p>
    </footer>
</body>

</html>