<?php 
    //Clase para representar un usuario
    class User {
        private $id_user;

        public function __construct($id_user) {
            $this->id_user = $id_user;
        }

        public function getIdUser() {
            return $this->id_user;
        }

         
    }    
?>