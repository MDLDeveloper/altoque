<?php
    include("classConectDB.php");
    include("classCredentials.php");
    include("env.php");

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");  

    $connectionDB = new ConnectDB(SERVIDOR, USUARIO, CLAVE, BASE, PUERTO);
    $credentials = new Credentials("unUsuario", "unaClave");

    echo $credentials->getHashUsuario(). "<br>";
    echo $credentials->getHashClaveFirst()."<br>";
    
    
?>