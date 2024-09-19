<?php
    include("classConectDB.php");
    include("classCredentials.php");
    include("env.php");

    $connectionDB = new ConnectDB(SERVIDOR, USUARIO, CLAVE, BASE);

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");  
?>