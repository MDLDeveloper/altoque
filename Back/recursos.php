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
    //se incluyen los endpoints
    includeAllFillInDir(__DIR__ . "/endpoints/");

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");  

    $connectionDB = new ConnectDB(SERVIDOR, USUARIO, CLAVE, BASE, PUERTO);
    //$credentials = new Credentials("unUsuario", "unaClave");
    $credentials = new Credentials("otroUsuario", "otraClave");

    echo $credentials->getHashUsuario(). "<br>";
    echo $credentials->getHashClaveFirst()."<br>";
    echo password_hash($credentials->getHashClaveFirst(), PASSWORD_DEFAULT)."<br> <br>";
    
    $login = new Login($credentials, $connectionDB);
    $result = $login->login();  
    if ($result instanceof Token) {  
        echo $result->getToken();  
    } else {
        echo $result;  
    echo  strval($connectionDB->error);
}
    
?>