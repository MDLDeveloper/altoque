<?php
    //Clase para procesar el registro  de usuarios
    class SingUp {
        private ConnectDB $connectionDB;
        private UserSignUp $user;
        function __construct(UserSignUp $user, ConnectDB $connectionDB)
        {
            $this->user = $user;
            $this->connectionDB = $connectionDB;
        }
        //Metodo para procesar el registro
        public function singUp(): MsgReturn {
            $status = new UserVerification($this->user, $this->connectionDB);
            $result = $status->verification();
            if($result->getStatus()) {
                $registration = new UserRegistration($this->user, $this->connectionDB);
                return $registration->register();
            }else{
                return $result;
            }
        }
    }
?>