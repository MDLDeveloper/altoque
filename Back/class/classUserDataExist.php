<?php
    // Clase abstracta para normalizar la verificación de existencia de datos
    abstract class UserDataExist {
        protected ConnectDB $connectionDB;
        protected string $data;

        function __construct(string $data, ConnectDB $connectionDB)
        {
            $this->data = $data;
            $this->connectionDB = $connectionDB;
        }

        // Método privado para ejecutar la consulta y verificar la existencia de los datos
        public function result(): bool {
            $resultado = $this->connectionDB->mdlquery($this->query());
            return empty($resultado);  // Devuelve false si hay resultado, true si no
        }

        // Método abstracto para implementar en las clases hijas en base a la verificación
        abstract protected function query(): string;
    }

    // clase para verificar si el username existe
    class UserExist extends UserDataExist {
        // Metodo privado para ejecutar la consulta y verificar la existencia del username
        protected function query(): string {
            return "SELECT id_credentials FROM credentials WHERE username = '$this->data'";
        }
    }

    //clase para verificar si el email existe
    class EmailExist extends UserDataExist {
        //metodo privado para ejecutar la consulta y verificar la existencia del email
        protected function query(): string {
            return "SELECT id_user FROM user WHERE email = '$this->data'";
        }
    }
?>