
<?php 
    //Clase para procesar las credenciales
    class Credentials {
        private string $usuario;
        private string $clave;

        function __construct(string $usuario, string $clave) {
            $this->usuario = $usuario;
            $this->clave = $clave;
        }

        public function getHashUsuario(): string {
            return hash('sha256', $this->usuario);
        }

        public function getHashClaveFirst(): string {
            return hash('sha256', $this->clave);
        }
    }
?>