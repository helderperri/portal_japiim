<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("vendor/autoload.php");
$googleClient = new Google_Client();
$googleClient->setClientId("80414879054-nushga2fr8bslcdne50jnp61qpl53k3s.apps.googleusercontent.com");
$googleClient->setClientSecret("sLGPSXqldXHsvj-8z_fLrwp7");
$googleClient->setApplicationName("Portal Japim");
$googleClient->setRedirectUri("https://japiim.linguasyanomami.com/callback.php");
$googleClient->addScope("https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile");





$dsn = "mysql:host=localhost;dbname=linguasy_japiim;port=3306;chartset=utf8";

//$dsn = "mysql:host=localhost;dbname=japiim;port=3306;chartset=utf8";

$opt = [

    PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      =>  false
];

$link2 = new PDO($dsn, "linguasy_user", "Hutukara!", $opt);
//$link = new PDO($dsn, 'root', '', $opt);

include ("functions.php");
?>