<?php 
//Clase para generar el token
    class Token {
        private string $token;
        private ConnectDB $connectionDB;	

        //Se genera el token al crear el objeto
        function __construct(int $id_credentials, ConnectDB $connectionDB) {
            $this->connectionDB = $connectionDB;
            
            $datetime = time(); //sacamos el timestamp actual
            $currentDateTime = (new DateTime())->format('Y-m-d H:i:s'); //obtenemos la fecha y hora actuales
            
            $generated = $id_credentials + $datetime; //generamos la sal del token
            $this->token = hash('sha256', $generated); //generamos el hash del token
            
            //actualizamos la tabla de credenciales
            $query = "UPDATE credentials SET token = '$this->token', lastlogin = '$currentDateTime' WHERE id_credentials = $id_credentials";
            $this->connectionDB->mdlquery($query);
        }
        //metodo para obtener el token
        public function getToken(): string {
            return $this->token;
        }
    }
?>