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
//Servicios
        public function ofrecerService(){}

        public function contratarService(){}

        public function calificarServidor(){}

        public function solicitarPresupuesto(){}
//Favoritos
        public function agregarFavorito(){}

        public function eliminarFavorito(){}

        public function obtenerFavoritos(){}
//Proyectos
        public function agregarProyectos(){}

        public function eliminarProyectos(){}

        public function obtenerProyectos(){}

//Perfil y datos propios
        public function cambiarContrasena(){}

        public function cambiarDatos(){}

        public function eliminarCuenta(){}

        public function obtenerDatos(){}

//Notificaciones y mensajes
        public function enviarMensaje(){}

        public function obtenerMensajes(){}

        public function eliminarMensaje(){}

        public function obtenerNotificaciones(){}

        
        //Metodo getter ID del usuario
        public function getIdUser() {
            return $this->id_user;
        }

        
         
    }    
?>