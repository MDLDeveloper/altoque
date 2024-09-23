<?php
    //Clase para procesar el registro  de usuarios
    class Registration {
        private ConnectDB $connectionDB;
        private UserSignUp $user;
        function __construct(UserSignUp $user, ConnectDB $connectionDB)
        {
            $this->user = $user;
            $this->connectionDB = $connectionDB;
        }
     
          /*public function getHashClaveFinal(): string {
            return password_hash($this->claveFirst, PASSWORD_DEFAULT);
        }*/
    }
?>