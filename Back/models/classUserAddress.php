<?php
    //Clase para representar la dirección de un usuario
    class UserAddress {
        private string $address;
        private string $number;
        private string $complement;
        function __construct(string $address, string $number, string $complement) {
            $this->address = $address;
            $this->number = $number;
            $this->complement = $complement;
        }
        //Metodo para obtener la dirección
        public function getAddress(): string {
            return $this->address;
        }
        //Metodo para obtener el número
        public function getNumber(): string {
            return $this->number;
        }
        //Metodo para obtener el complemento
        public function getComplement(): string {
            return $this->complement;
        }
    }
?>