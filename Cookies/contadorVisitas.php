<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['visitas']))
        {
            setcookie('visitas' , $_COOKIE['visitas']++ ,time()+3600*24);
            $mensaje = 'Numero de visitas: '.$_COOKIE['visitas'];   
        }
        else
        {
            setcookie('visitas' , 1 , time()+3600*24);
            $mensaje = 'Bienvenido por primera vez a nuesta web';
        }
        echo $mensaje;
        //setcookie('visitas',1,time()-1); Para borrar la cookie.
    ?>
</body>
</html>