<?php
    include("classConectDB.php");
    include("classCredentials.php");
    include("env.php");
    include("classLogin.php");
    include("classValidation.php");
    include("classToken.php");
    include("classMsgValidation.php");
    include("classRegistration.php");

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