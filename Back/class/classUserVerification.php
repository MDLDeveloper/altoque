<?php
    //Clase para verificar el usuario
    class UserVerification {
        private ConnectDB $connectionDB;
        private UserSignUp $user;
        function __construct(UserSignUp $user, ConnectDB $connectionDB)
        {
            $this->user = $user;
            $this->connectionDB = $connectionDB;
        }
        //Metodo para verificar el usuario
        public function verification(): MsgReturn {
            $userExist = new UserExist($this->user->getCredentials()->getHashUsuario(), $this->connectionDB);
            if($userExist) {
                $emailExist = new EmailExist($this->user->getEmail(), $this->connectionDB);
                if($emailExist) {
                    return new MsgReturn(true, "El usuario puede registrarse");
                }else{
                    return new MsgReturn(false, "El email ya existe");
                }
            }else{
                return new MsgReturn(false, "El usuario ya existe");
            }
        }
    }
?>