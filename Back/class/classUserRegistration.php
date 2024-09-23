<?php
    //Clase para realizar el registro de usuarios
    class UserRegistration {
        private ConnectDB $connectionDB;
        private UserSignUp $user;
        function __construct(UserSignUp $user, ConnectDB $connectionDB)
        {
            $this->user = $user;
            $this->connectionDB = $connectionDB;
        }
        //Metodo para realizar el registro
        public function register(): MsgReturn{
            $currentDateTime = (new DateTime())->format('Y-m-d'); 
            $queryUser = "INSERT INTO users (name, lastname, email, numberphone, birthdate, gender, signup_date) VALUES ('$this->user->getName()', '$this->user->getLastname()', '$this->user->getEmail()', '$this->user->getNumberPhone()', '$this->user->getBirthdate()', '$this->user->getGender()', '$currentDateTime')";

            
            $queryAdress  = "INSERT INTO address (address, number, complement) VALUES ('$this->user->getAddress()->getAddress()', '$this->user->getAddress()->getNumber()', '$this->user->getAddress()->getComplement()')";
            
            $password = password_hash($this->user->getCredentials()->getHashClaveFirst(), PASSWORD_DEFAULT);
            $queryCredentials = "INSERT INTO credentials (username, psw, id_user) VALUES ('$this->user->getCredentials()->getHashUsuario()', 
        }
    
    }     
?>

