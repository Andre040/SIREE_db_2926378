<?php
    // Nombra la clase
    class User {

        // Atributos
        private $user_name;

        // Métodos setter y getter

        # Usuario: Nombre         
        public function setUserName($user_name){
            $this->user_name = $user_name;
        }
        public function getUserName(){
            return $this->user_name;
        }



        // Métodos: Persistencia a la base de datos
        public function login(){

        }

    }

?>