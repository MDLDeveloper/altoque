<?php 
//Clase para generar el token
    class Token {
        private string $token;
        private ConnectDB $connectionDB;	

        function __construct(int $id_credentials, ConnectDB $connectionDB) {
            $this->connectionDB = $connectionDB;
            $datetime = time();
            $generated = $id_credentials + $datetime;
            $this->token = hash('sha256', $generated);
            $currentDateTime = (new DateTime())->format('Y-m-d H:i:s');

            $query = "UPDATE user SET token = '$this->token', lastlogin = '$currentDateTime' WHERE id_credentials = $id_credentials";
            $this->connectionDB->mdlquery($query);
        }

        public function getToken(): string {
            return $this->token;
        }
    }
?>