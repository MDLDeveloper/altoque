<?php 
//Clase para procesar el login y devolver el token en caso de que sea correcto
    class Login {
        private ConnectDB $connectionDB;
        private Credentials $credentials;
        function __construct(Credentials $credentials, ConnectDB $connectionDB)
        {
            $this->credentials = $credentials;
            $this->connectionDB = $connectionDB;
        }
        
        public function login(){
            $validation = new Validation($this->credentials, $this->connectionDB);
            $result = $validation->validate();

            if(!$result->getStatus()) {
                $this->getError($result);
            }else{
                $this->getToken($validation);
            }
        }

        public function getError(MsgValidation $msj): string{
            return $msj->toJson();
        }

        public function getToken(Validation $validation): Token {
            return new Token($validation->getIdUser());
        }
    }
?>  