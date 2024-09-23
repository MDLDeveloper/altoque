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
        //Metodo para procesar el login
        public function login(): string|Token {
            $validation = new Validation($this->credentials, $this->connectionDB);
            $result = $validation->validate();

            if(!$result->getStatus()) {
                return $this->getError($result);
            }else{
                return $this->getToken($validation);
            }
        }
        //Metodo para devolver el mensaje de error
        private function getError(MsgReturn $msj): string{
            return $msj->toJson();
        }
        //Metodo para devolver el token
        private function getToken(Validation $validation): Token {
            return new Token($validation->getIdUser(), $this->connectionDB);
        }
    }
?>  