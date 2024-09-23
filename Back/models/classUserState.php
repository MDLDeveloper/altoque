<<?php
    //Clase para representar la provincia de un usuario
    class UserState {
        private int $state;
        function __construct(int $state) {
            $this->state = $state;
        }
        //Metodo para obtener el estado
        public function getStateId(): string {
            return $this->state;
        }
        
        //Metodo para obtener las proviancias argentinas en texto 
        public function getStateText(): string {
            switch($this->state) {
                case 1:
                    return "Buenos Aires";
                case 2:
                    return "Catamarca";
                case 3:
                    return "Chaco";
                case 4:
                    return "Chubut";
                case 5:
                    return "Cordoba";
                case 6:
                    return "Corrientes";
                case 7:
                    return "Ciudad Autonoma de Buenos Aires";
                case 8:
                    return "Entre Rios";
                case 9:
                    return "Formosa";
                case 10:
                    return "Jujuy";
                case 11:
                    return "La Pampa";
                case 12:
                    return "La Rioja";
                case 13:
                    return "Mendoza";
                case 14:
                    return "Misiones";
                case 15:
                    return "Neuquen";
                case 16:
                    return "Rio Negro";
                case 17:
                    return "Salta";
                case 18:
                    return "San Juan";
                case 19:
                    return "San Luis";
                case 20:
                    return "Santa Cruz";
                case 21:
                    return "Santa Fe";
                case 22:
                    return "Santiago del Estero";
                case 23:
                    return "Tierra del Fuego";
                case 24:
                    return "Tucuman";
                default:
                    return "No especificado";
            }
        }
    }       
?>