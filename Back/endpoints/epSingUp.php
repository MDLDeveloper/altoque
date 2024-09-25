<?php
//Endpoint para procesar el registro de usuarios
include ("../recursos.php");

$data = json_decode(file_get_contents("php://input"));

if(!$data) {
    $result = new MsgReturn(false, "No se recibieron datos");
    return $result->toJson();
}

if($data->name == null || $data->lastname == null || $data->email == null || $data->numberphone == null || $data->birthdate == null || $data->gender == null || $data->address == null || $data->country == null || $data->province == null || $data->locality == null) {
    $result = new MsgReturn(false, "Faltan datos obligatorios");
    return $result->toJson();
}

if(gettype($data->name) !== "string" || gettype($data->lastname) !== "string" || gettype($data->email) !== "string" || gettype($data->numberphone) !== "string" || gettype($data->birthdate) !== "string" || gettype($data->gender) !== "integer" || gettype($data->address) !== "string" || gettype($data->country) !== "integer" || gettype($data->province) !== "integer" || gettype($data->locality) !== "integer") {
    $result = new MsgReturn(false, "Los datos no son del tipo esperado");
    return $result->toJson();
}

$name = $data->name;
$lastname = $data->lastname;
$email = $data->email;
$numberphone = $data->numberphone;
$birthdate = $data->birthdate;
$gender = new UserGender($data->gender);
$address = new UserAddress($data->address, $data->number, $data->complement, $data->country, $data->province, $data->locality);
$country = new UserCountry($data->country);
$state = new UserProvince($data->state);
$locality = new UserLocality($data->locality);
$credentials = new Credentials($username, $password);

$user = new UserSignUp($credentials, $name, $lastname, $email, $numberphone, $birthdate, $gender, $address, $country, $state, $locality);

$registration = new SingUp($user, $connectionDB);
$result = $registration->singUp();

if ($result->getStatus()) {
    echo "Registro exitoso";
} else {
    echo $result->getMsg();
}   

?>