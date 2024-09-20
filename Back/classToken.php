<?php 
//Clase para generar el token
    class Token {
        private string $token;

        function __construct(int $token) {
            $this->token = $token;
        }

        public function getToken(): string {
            return $this->token;
        }
    }
?>