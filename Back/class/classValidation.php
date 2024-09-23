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
        //Metodo para validar las credenciales
        public function validate(): MsgReturn {
            //Buscamos en la tabla de credenciales el usuario
            $query = "SELECT * FROM credentials WHERE username = '$this->usuario'";
            $resultado = $this->connectionDB->mdlquery($query);

            //Verificamos si se pudo conectar a la base de datos
            if($resultado !== false) {

                //Verificamos si el usuario existe    
                if(empty($resultado)) {
                    
                    //Si el usuario no existe devolvemos un mensaje de error
                    return new MsgReturn(false, "No existe el usuario");                
                }else{
                    
                    //Si el usuario existe verificamos si la clave es correcta
                    if(password_verify($this->claveFirst, $resultado[0]['psw'])) {
                        $this->id_user = $resultado[0]['id_credentials'];
                        return  new MsgReturn(true, "Usuario validado satisfactoriamente");
                    }else{
                        return  new MsgReturn(false, "Clave incorrecta");
                    }
                }
            }else{
                return new MsgReturn(false, "Error al conectar con la base de datos: ".$this->connectionDB->error);
            }
        }
        //Metodo getter para el id de usuario
        public function getIdUser(): int {
            return $this->id_user;
        }
   }
?>