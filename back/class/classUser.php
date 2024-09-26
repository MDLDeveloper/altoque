<?php 
    /*
        Clase abstracta para modelar los usuarios y realizar las operaciones
        necesarias para el sistema.
    */
    class User {
        private $id_user;
        private $dbconexion;

        public function __construct(int $id_user, ConnectDB $dbconexion) {
            $this->id_user = $id_user;
            $this->dbconexion = $dbconexion;
        }

        public function ofrecerService(){}

        public function contratarService(){}

        public function agregarFavorito(){}

        public function eliminarFavorito(){}

        public function obtenerFavoritos(){}

        public function agregarProyectos(){}

        public function eliminarProyectos(){}

        public function obtenerProyectos(){}

        public function cambiarContrasena(){}


        public function getIdUser() {
            return $this->id_user;
        }

        
         
    }    
?>