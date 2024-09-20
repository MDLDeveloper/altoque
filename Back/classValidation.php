<?php 
//Clase para validar las credenciales
    class Validation {
        private string $usuario;
        private string $claveFirst;
        private ConnectDB $connectionDB;
        private int $id_user;

        function __construct(Credentials $credentials, ConnectDB $connectionDB) {
            $this->usuario = $credentials->getHashUsuario();
            $this->claveFirst = $credentials->getHashClaveFirst();
            $this->connectionDB = $connectionDB;
            $this->id_user = -1;
        }
        
        public function validate(): MsgValidation {
            $query = "SELECT * FROM user WHERE username = '$this->usuario'";
            $resultado = $this->connectionDB->mdlquery($query);
            if($resultado) {
                if(!empty($resultado)) {
                    return new MsgValidation(false, "No existe el usuario");
                }else{
                    if(password_verify($this->claveFirst, $resultado->psw)) {
                        $this->id_user = $resultado->id;
                        return  new MsgValidation(true, "Usuario validado satisfactoriamente");
                    }else{
                        return  new MsgValidation(false, "Clave incorrecta");
                    }
                }
            }else{
                return new MsgValidation(false, "Error al conectar con la base de datos");
            }
        }

        public function getIdUser(): int {
            return $this->id_user;
        }
   }
?>