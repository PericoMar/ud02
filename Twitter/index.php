<?php
/*Importamos el archivo que hicimos antes de config, para traernos la instancia de HybridAuth*/
require_once 'config.php';

/*Bloque try/catch para autentificar al usuario, acceder a su perfil y pintarlo por pantalla*/
try {
    $adapter->authenticate();
    $userProfile = $adapter->getUserProfile();
    print_r($userProfile);
    //Redigirige al usuario a la página de logout que veremos más adelante.
    echo '<a href="logout.php">Logout</a>';
}
catch( Exception $e ){
    echo $e->getMessage() ;
}