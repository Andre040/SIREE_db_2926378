<?php
// Nombra la clase
    class rol {
        
        // Atributos
        private $dbh;
        private $rol_id;
        private $rol_name;
        // Sobrecarga de Constructores
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Constructor 07 parámetros
        public function __construct7($rol_id,$rol_name){
            $this->rol_id = $rol_id;            
            $this->rol_name = $rol_name;            
        }

        // Métodos setter y getter
        
        # Usuario: Id
        public function setRolId($rol_id){
            $this->rol_id = $rol_id;
        }
        public function getRolId(){
            return $this->rol_id;
        }
        # Usuario: Nombre         
        public function setRolName($rol_name){
            $this->rol_name = $rol_name;
        }
        public function getRolName(){
            return $this->rol_name;
        }
    }