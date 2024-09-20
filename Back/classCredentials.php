
<?php 
    //Clase para procesar las credenciales
    class Credentials {
        private string $usuario;
        private string $clave;

        function __construct(string $usuario, string $clave) {
            $this->usuario = $usuario;
            $this->clave = $clave;
        }
        //metodo para obtener el hash del usuario
        public function getHashUsuario(): string {
            return hash('sha256', $this->usuario);
        }

        //metodo para obtener el hash base de la clave
        public function getHashClaveFirst(): string {
            return hash('sha256', $this->clave);
        }
    }
?>