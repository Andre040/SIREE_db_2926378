<?php
    // Nombra la clase
    class User {
        
        // Atributos
        private $dbh;
        private $user_id;
        private $user_name;
        private $user_email;
        private $user_password;
        private $user_address;
        private $user_rol;
        private $user_phone;

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
        public function __construct7($user_id,$user_name,$user_address,$user_email,$user_phone,$user_rol,$user_password){
            $this->user_id = $user_id;            
            $this->user_name = $user_name;            
            $this->user_email = $user_email;            
            $this->user_password = $user_password;            
            $this->user_address = $user_address;
            $this->user_rol = $user_rol;            
            $this->user_phone = $user_phone;            
        }

        // Métodos setter y getter
        
        # Usuario: Id
        public function setUserId($user_id){
            $this->user_id = $user_id;
        }
        public function getUserId(){
            return $this->user_id;
        }
        # Usuario: Nombre         
        public function setUserName($user_name){
            $this->user_name = $user_name;
        }
        public function getUserName(){
            return $this->user_name;
        }
        # Usuario: Correo         
        public function setUserEmail($user_email){
            $this->user_email = $user_email;
        }
        public function getUserEmail(){
            return $this->user_email;
        }
        # Usuario: Contraseña        
        public function setUserPassword($user_password){
            $this->user_password = $user_password;
        }
        public function getUserPassword(){
            return $this->user_password;
        }
        # Usuario: Direccion         
        public function setUserAddress($user_address){
            $this->user_address = $user_address;
        }
        public function getUserAddress(){
            return $this->user_address;
        }
        # Usuario: Rol     
        public function setUserRol($user_rol){
            $this->user_rol = $user_rol;
        }
        public function getUserRol(){
            return $this->user_rol;
        }
        # Usuario: Teléfono         
        public function setUserPhone($user_phone){
            $this->user_phone = $user_phone;
        }
        public function getUserPhone(){
            return $this->user_phone;
        }
        
        // Métodos: Persistencia a la base de datos
        
        # Login
        public function login(){
            try {
                $sql = 'SELECT * FROM USERS
                        WHERE user_email = :userEmail AND user_pass = :userPass';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPass', sha1($this->getUserPassword()));
                $stmt->execute();
                $userDb = $stmt->fetch();
                if ($userDb) {
                    $user = new User(
                        $userDb['rol_code'],                    
                        $userDb['user_code'],
                        $userDb['user_name'],
                        $userDb['user_lastname'],
                        $userDb['user_id'],
                        $userDb['user_email'],
                        $userDb['user_pass'],
                        $userDb['user_state']
                    );
                    return $user;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        

        # CU09 - Crear Usuario
        public function user_create(){
            try {
                $sql = 'INSERT INTO SOCIOS VALUES (
                        :socio_id,
                        :socio_nombre,
                        :socio_direccion,
                        :socio_categoria,
                        :socio_telefono,
                        :socio_pass,
                        :socio_estado
                    )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('socio_id', $this->getUserId());                
                $stmt->bindValue('socio_nombre', $this->getUserName());                
                $stmt->bindValue('socio_categoria', $this->getUserEmail());                
                $stmt->bindValue('socio_pass', $this->getUserPassword());                
                $stmt->bindValue('socio_direccion', $this->getUserAddress());                
                $stmt->bindValue('socio_estado', $this->getUserRol());                
                $stmt->bindValue('socio_telefono', $this->getUserPhone());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>