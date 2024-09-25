<?php
//Endpoint para procesar el registro de usuarios
include ("../recursos.php");

$data = json_decode(file_get_contents("php://input"));

// Obtener datos de entrada
if(!$data) {
    $result = new MsgReturn(false, "No se recibieron datos");
    echo $result->toJson();
    exit;
}

// Validar campos obligatorios
$requiredFields = ['name', 'lastname', 'email', 'numberphone', 'birthdate', 'gender', 'address', 'country', 'province', 'locality', 'username', 'password'];

foreach ($requiredFields as $field) {
    if (empty($data->$field)) {
        $result = new MsgReturn(false, "Faltan datos obligatorios: $field");
        echo $result->toJson();
        exit;
    }
}

// Validar tipos de datos
if (!is_string($data->name) || !is_string($data->lastname) || !is_string($data->email) || 
    !is_string($data->numberphone) || !is_string($data->birthdate) || 
    !is_int($data->gender) || !is_string($data->address) || !is_int($data->country) || 
    !is_int($data->province) || !is_int($data->locality) || !is_string($data->username) || 
    !is_string($data->password)) {
    $result = new MsgReturn(false, "Los datos no son del tipo esperado");
    echo $result->toJson();
    exit;
}

// Validar formato de email
if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
    $result = new MsgReturn(false, "El formato del correo electrónico es inválido");
    echo $result->toJson();
    exit;
}

$name = $data->name;
$lastname = $data->lastname;
$email = $data->email;
$numberphone = $data->numberphone;
$birthdate = new DateTime($data->birthdate);
$gender = new UserGender($data->gender);
$country = new UserCountry($data->country);
$state = new UserProvince($data->state);
$locality = new UserLocality($data->locality);
$address = new UserAddress($data->address, $data->number, $data->complement, $country, $state, $locality);
$credentials = new Credentials($username, $password);

$user = new UserSignUp($credentials, $name, $lastname, $email, $numberphone, $birthdate, $gender, $address, $country, $state, $locality);

$registration = new SingUp($user, $connectionDB);
$result = $registration->singUp();

if ($result->getStatus()) {
    echo $result->toJson();
} else {
    echo $result->toJson();
}   

?>