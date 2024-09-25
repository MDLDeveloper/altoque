<?php
    //Clase para representar el género de un usuario
    class UserGender {
        private int $gender;
        function __construct(int $gender) {
            $this->gender = $gender;
        }
        //Metodo para obtener el género
        public function getGenderId(): int {
            return $this->gender;
        }
        //Metodo para obtener el género en texto
        public function getGender(): string {
            switch($this->gender) {
                case 1:
                    return "Masculino";
                case 2:
                    return "Femenino";
                default:
                    return "No especificado";
            }
        }
    }
?>