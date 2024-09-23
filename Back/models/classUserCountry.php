<?php
    //Clase para representar el país de un usuario
    class UserCountry {
        private int $country;
        function __construct(int $country) {
            $this->country = $country;
        }
        //Metodo para obtener el país
        public function getCountryId(): string {
            return $this->country;
        }
        //Metodo para obtener el país en texto
        public function getCountry(): string {
            switch($this->country) {
                case 1:
                    return "Argentina";
                case 2:
                    return "Bolivia";
                case 3:
                    return "Brasil";
                case 4:
                    return "Chile";
                case 5:
                    return "Colombia";
                case 6:
                    return "Ecuador";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                case 7:
                    return "Venezuela";
                case 8:
                    return "Guyana";
                case 9:
                    return "Paraguay";
                case 10:
                    return "Peru";
                case 11:
                    return "Suriname";
                case 12:
                    return "Uruguay";
                default:
                    return "No especificado";
            }
        }
    }  