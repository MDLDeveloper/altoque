<?php
    // Clase para realizar el registro de usuarios
    class UserRegistration {
        private ConnectDB $connectionDB;
        private UserSignUp $user;
        private string $error;

        function __construct(UserSignUp $user, ConnectDB $connectionDB) {
            $this->user = $user;
            $this->connectionDB = $connectionDB;
        }

        // Método para realizar el registro
        public function register(): MsgReturn {
            try {
                // Iniciar la transacción
                $this->connectionDB->beginTransaction();

                // Variable con la fecha actual
                $currentDateTime = (new DateTime())->format('Y-m-d'); 

                // Consulta para insertar el usuario
                $queryUser = "INSERT INTO users (name, lastname, email, numberphone, birthdate, gender, signup_date) 
                              VALUES (:name, :lastname, :email, :numberphone, :birthdate, :gender, :signup_date)";
                $paramsUser = [
                    ':name' => $this->user->getName(),
                    ':lastname' => $this->user->getLastname(),
                    ':email' => $this->user->getEmail(),
                    ':numberphone' => $this->user->getNumberPhone(),
                    ':birthdate' => $this->user->getBirthdate(),
                    ':gender' => $this->user->getGender(),
                    ':signupdate' => $currentDateTime
                ];

                // Realizar query y obtener el id del usuario
                $id_user = $this->connectionDB->mdlquery($queryUser, $paramsUser);

                // Consulta para insertar la dirección
                $queryAddress = "INSERT INTO address (address, number, complement, id_user) 
                                 VALUES (:address, :number, :complement, :country, :province, :city, :id_user)";
                $paramsAddress = [
                    ':address' => $this->user->getAddress()->getAddress(),
                    ':number' => $this->user->getAddress()->getNumber(),
                    ':complement' => $this->user->getAddress()->getComplement(),
                    ':country' => $this->user->getAddress()->getCountry()->getCountryId(),
                    ':province' => $this->user->getAddress()->getProvince()->getProvinceId(),
                    ':locality' => $this->user->getAddress()->getLocality()->getLocalityId(),
                    ':id_user' => $id_user
                ];
                $this->connectionDB->mdlquery($queryAddress, $paramsAddress);

                // Hashear la contraseña
                $password = password_hash($this->user->getCredentials()->getHashClaveFirst(), PASSWORD_DEFAULT);

                // Consulta para insertar las credenciales
                $queryCredentials = "INSERT INTO credentials (username, psw, id_user) 
                                     VALUES (:username, :psw, :id_user)";
                $paramsCredentials = [
                    ':username' => $this->user->getCredentials()->getHashUsuario(),
                    ':psw' => $password,
                    ':id_user' => $id_user
                ];
                $this->connectionDB->mdlquery($queryCredentials, $paramsCredentials);

                // Confirmar la transacción
                $this->connectionDB->commit();

                return new MsgReturn(true, "Registro exitoso");

            } catch (Exception $e) {
                // Revertir la transacción en caso de error
                $this->connectionDB->rollBack();
                $this->error = $e->getMessage();
                return $this->getError();
            }
        }

        // Método para obtener el mensaje de error
        public function getError(): MsgReturn {
            return new MsgReturn(false, "Error al registrar: " . $this->error);
        }
    }
?>
