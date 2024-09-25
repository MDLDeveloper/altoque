<?php
    //Clase para representar la dirección de un usuario
    class UserAddress {
        private string $address;
        private string $number;
        private string $complement;
        private int $country;
        private int $province;
        private int $locality;

        function __construct(string $address, string $number, string $complement, int $country, int $province, int $locality) {
            $this->country = $country;
            $this->province = $province;
            $this->locality = $locality;
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
        //Metodo para obtener el país
        public function getCountryId(): int {
            return $this->country;
        }
        //Metodo para obtener la provincia
        public function getProvinceId(): int {
            return $this->province;
        }
        //Metodo para obtener la ciudad
        public function getLocalityId(): int {
            return $this->locality;
        }
    }
?>