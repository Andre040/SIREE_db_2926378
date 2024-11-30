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
        

    # RF04_CU04 - Consultar Usuarios
    public function read_users()
    {
        try {
            $userList = [];
            $sql = 'SELECT * FROM USUARIOS';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $userDb) {
                $userObj = new User;
                $userObj->setUserId($userDb['id_usuario']);
                $userObj->setUserName($userDb['nombre']);
                $userObj->setUserName($userDb['email']);
                $userObj->setUserName($userDb['contraseña']);
                $userObj->setUserName($userDb['celular']);
                $userObj->setUserName($userDb['direccion']);
                array_push($userList, $userObj);
            }
            return $userList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    # RF06_CU06 - Actualizar Usuarios
    public function update_users()
    {
        try {
            $sql = 'UPDATE USUARIOS SET
                            id_usuario = UserCode,
                            nombre = :UserName,
                            email = :UserEmail,
                            contraseña = :UserPassword,
                            celular = :UserPhone,
                            direccion = UserAdress
                        WHERE id_usuario = :UserCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('UserCode', $this->getRolId());
            $stmt->bindValue('UserName', $this->getUserName());
            $stmt->bindValue('UserEmail', $this->getUserEmail());
            $stmt->bindValue('UserPassword', $this->getUserPassword());
            $stmt->bindValue('UserPhone', $this->getUserPhone());
            $stmt->bindValue('UserAddress', $this->getUserAddress());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    # RF07_CU07 - Eliminar Usuario
    public function delete_User($user_id)
    {
        try {
            $sql = 'DELETE FROM USUARIOS WHERE id_usuario = :UserCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('UserCode', $user_id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    }
?>