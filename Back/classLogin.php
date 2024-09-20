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
        
        public function login(): string|Token {
            $validation = new Validation($this->credentials, $this->connectionDB);
            $result = $validation->validate();

            if(!$result->getStatus()) {
                return $this->getError($result);
            }else{
                return $this->getToken($validation);
            }
        }

        private function getError(MsgValidation $msj): string{
            return $msj->toJson();
        }

        private function getToken(Validation $validation): Token {
            return new Token($validation->getIdUser(), $this->connectionDB);
        }
    }
?>  