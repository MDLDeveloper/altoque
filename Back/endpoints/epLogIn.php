<?php
//Endpoint para procesar el login
include("../recursos.php");

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

$credentials = new Credentials($username, $password);

$login = new Login($credentials, $connectionDB);
$result = $login->login();  
if ($result instanceof Token) {  
    echo $result->getToken();  
} else {
    echo $result;  
}

?>