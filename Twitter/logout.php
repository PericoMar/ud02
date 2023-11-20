<?php
/*Importamos el archivo que hicimos antes de config, para traernos la instancia de HybridAuth*/
require_once 'config.php';

/*Bloque try/catch desconectar al usuario y pintar por pantalla que se ha desconectado*/
try {
    if ($adapter->isConnected()) {
        $adapter->disconnect();
        echo 'Logged out the user';
        echo '<p><a href="index.php">Login</a></p>';
    }
}
catch( Exception $e ){
    echo $e->getMessage() ;
}