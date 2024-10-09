<?php
    //Clase para representar el departamento
    class UserDepartament {
        private int $departament;
        function __construct(int $departament) {
            $this->departament = $departament;
        }
        //Metodo para obtener el departamento
        public function getDepartamentId(): int {
            return $this->departament;
        }
        //Metodo para obtener el departamento en texto
        public function getDepartamentText(): string {
            return "Despues lo implementare";
        }
    }
?>