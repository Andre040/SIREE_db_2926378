    <?php
    class User
    {
        private $dbh;
        private $user_id = NULL;
        private $user_name;
        private $user_email;
        private $user_password;
        private $user_address;
        private $user_rol = 1;
        private $user_phone;

        public function __construct()
        {
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

        public function __construct7($user_id, $user_name, $user_address, $user_email, $user_phone, $user_rol = 1, $user_password)
        {
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_password = $user_password;
            $this->user_address = $user_address;
            $this->user_rol = $user_rol;
            $this->user_phone = $user_phone;
        }

        public function setUserId($user_id)
        {
            $this->user_id = $user_id;
        }
        public function getUserId()
        {
            return $this->user_id;
        }
        public function setUserName($user_name)
        {
            $this->user_name = $user_name;
        }
        public function getUserName()
        {
            return $this->user_name;
        }
        public function setUserEmail($user_email)
        {
            $this->user_email = $user_email;
        }
        public function getUserEmail()
        {
            return $this->user_email;
        }
        public function setUserPassword($user_password)
        {
            $this->user_password = $user_password;
        }
        public function getUserPassword()
        {
            return $this->user_password;
        }
        public function setUserAddress($user_address)
        {
            $this->user_address = $user_address;
        }
        public function getUserAddress()
        {
            return $this->user_address;
        }
        public function setUserRol($user_rol)
        {
            $this->user_rol = $user_rol;
        }
        public function getUserRol()
        {
            return $this->user_rol;
        }
        public function setUserPhone($user_phone)
        {
            $this->user_phone = $user_phone;
        }
        public function getUserPhone()
        {
            return $this->user_phone;
        }

        public function user_create()
        {
            try {
                $sql = 'INSERT INTO USUARIOS (nombre, email, contraseña, celular, direccion, id_rol) VALUES (
                            :nombre,
                            :email,
                            :contraseña,
                            :celular,
                            :direccion,
                            1
                        )'; // id_rol predeterminado a 1
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue(':nombre', $this->getUserName());
                $stmt->bindValue(':email', $this->getUserEmail());
                $stmt->bindValue(':contraseña', $this->getUserPassword());
                $stmt->bindValue(':celular', $this->getUserPhone());
                $stmt->bindValue(':direccion', $this->getUserAddress());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function read_users()
        {
            try {
                $userList = [];
                $sql = 'SELECT u.*, r.nombre AS rol_nombre FROM USUARIOS u JOIN ROL r ON u.id_rol = r.id_rol';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $userDb) {
                    $userObj = new User();
                    $userObj->setUserId($userDb['id_usuario']);
                    $userObj->setUserName($userDb['nombre']);
                    $userObj->setUserEmail($userDb['email']);
                    $userObj->setUserPassword($userDb['contraseña']);
                    $userObj->setUserPhone($userDb['celular']);
                    $userObj->setUserAddress($userDb['direccion']);
                    $userObj->setUserRol($userDb['rol_nombre']);
                    array_push($userList, $userObj);
                }
                return $userList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function update_users()
        {
            try {
                $sql = 'UPDATE USUARIOS SET
                        id_usuario = UserCode:,
                        nombre = :UserName,
                        email = :UserEmail,
                        contraseña = :UserPassword,
                        celular = :UserPhone,
                        direccion = :UserAddress,
                        id_rol = :UserRole
                    WHERE id_usuario = :UserCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue(':UserCode', $this->getUserId());
                $stmt->bindValue(':UserName', $this->getUserName());
                $stmt->bindValue(':UserEmail', $this->getUserEmail());
                $stmt->bindValue(':UserPassword', $this->getUserPassword());
                $stmt->bindValue(':UserPhone', $this->getUserPhone());
                $stmt->bindValue(':UserAddress', $this->getUserAddress());
                $stmt->bindValue(':UserRole', $this->getUserRol());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function delete_User($user_id)
        {
            try {
                $sql = 'DELETE FROM USUARIOS WHERE id_usuario = :UserCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue(':UserCode', $user_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
       public function getRoleIdByName($role_name)
{
    try {
        $sql = 'SELECT id_rol FROM ROL WHERE nombre = :role_name';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':role_name', $role_name);
        $stmt->execute();
        $role = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica si se encontró un rol
        if ($role && isset($role['id_rol'])) {
            return $role['id_rol'];
        } else {
            throw new Exception("Role not found for name: $role_name");
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
    }