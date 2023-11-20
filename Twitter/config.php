<?php
/*Importamos la librería de HybridAuth*/
require_once 'vendor/autoload.php';
 
/*
Creamos el array de configuración
callback => Donde te redirige después de loguearte
keys => Tus claves de la API de Twitter
authorize => Si quieres que te pida autorización cada vez que te logueas
*/
$config = [
    'callback' => 'YOUR_DOMAIN_URL/index.php',
    'keys'     => ['key' => 'TWITTER_CONSUMER_API_KEY', 'secret' => 'TWITTER_CONSUMER_API_SECRET_KEY'],
    'authorize' => true
];

/*
Creamos la instancia del adaptador de Twitter, le pasamos el array de configuración.
*/
$adapter = new Hybridauth\Provider\Twitter( $config );