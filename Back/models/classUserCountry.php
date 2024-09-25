<?php
    //Clase para representar el país de un usuario
    class UserCountry {
        private int $country;
        function __construct(int $country) {
            $this->country = $country;
        }
        //Metodo para obtener el país
        public function getCountryId(): int {
            return $this->country;
        }
        //Metodo para obtener el país en texto
        public function getCountryText(): string {
            return "Despues lo implementare";
        }
    }  