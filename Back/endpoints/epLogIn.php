<?php
// Endpoint para procesar el login
include("../recursos.php");

$data = json_decode(file_get_contents("php://input"));

// Verificar si se recibieron datos
if (!$data) {
    $result = new MsgReturn(false, "No se recibieron datos");
    echo $result->toJson();
    return;
}

// Verificar si faltan campos obligatorios
if (empty($data->username) || empty($data->password)) {
    $result = new MsgReturn(false, "Faltan datos obligatorios");
    echo $result->toJson();
    return;
}

// Verificar tipos de datos
if (gettype($data->username) !== "string" || gettype($data->password) !== "string") {
    $result = new MsgReturn(false, "Los datos no son del tipo esperado");
    echo $result->toJson();
    return;
}

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