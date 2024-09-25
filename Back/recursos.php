<?php
    //funcion para incluir las clases
    function includeAllFillInDir(string $directory) {
        foreach (glob($directory . '/*.php') as $file) {
            include $file;
        }
    }
    
    //Se agregan constantes constantes
    include("env.php");
    
    //Se incluyen las clases
    includeAllFillInDir(__DIR__ . "/class/");
    //se incluyen los models
    includeAllFillInDir(__DIR__ . "/models/");

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");  

    $connectionDB = new ConnectDB(SERVIDOR, USUARIO, CLAVE, BASE, PUERTO);
    
?>