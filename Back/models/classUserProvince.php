<<?php
    //Clase para representar la provincia de un usuario
    class UserProvince {
        private int $state;
        function __construct(int $state) {
            $this->state = $state;
        }
        //Metodo para obtener el estado
        public function getProvinceId(): string {
            return $this->state;
        }
        
        //Metodo para obtener las proviancias argentinas en texto 
        public function getProvinceText(): string {
            return "Despues lo implementare";
        }
    }       
?>