<?php
    //Clase para representar la localidad de un usuario
    class UserLocality {
        private int $locality;
        function __construct(int $locality) {
            $this->locality = $locality;
        }
        //Metodo para obtener la localidad
        public function getLocalityId(): string {
            return $this->locality;
        }
        //Metodo para obtener la localidad en texto
        public function getLocality(): string {
            switch($this->locality) {
                case 1:
                    return "Banfield";
                case 2:
                    return "Belgrano";
                case 3:
                    return "Berazategui";
                case 4:
                    return "La Paz";
                case 5:
                    return "Locamas De Zamora";
                case 6:
                    return "Los Andes";
                case 7:
                    return "Maipu";
                case 8:
                    return "Parana";
                case 9:
                    return "Rio Chico";
                case 10:
                    return "San Antonio De Los Andes";
                case 11:
                    return "San Felipe De Los Andes";
                case 12:
                    return "San Javier";
                case 13:
                    return "San Luis De La Paz";
                case 14:
                    return "San Nicolas De Los Andes";
                case 15:
                    return "San Pedro De Los Andes";
                case 16:
                    return "Santa Cruz De La Sierra";
                case 17:
                    return "Santa Lucia";
                case 18:
                    return "Santa Rosa De La Laguna";
                case 19:
                    return "Santa Rosa De Osos";
                case 20:
                    return "Santo Tome De Villa Maria";
                case 21:
                    return "Taltal";
                case 22:
                    return "Tres Arroyos";
                case 23:
                    return "Tres Zaguas";
                case 24:
                    return "Villa Mercedes";
                default:
                    return "No especificado";
            }
        }
    }
?>
