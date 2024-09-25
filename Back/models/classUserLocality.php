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
        public function getLocalityText(): string {
            return "Despues lo implementare";
        }
    }
?>
