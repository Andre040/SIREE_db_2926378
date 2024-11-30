<?php

// Nombra la clase
class User
{

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

    # Constructor 07 parámetros
    public function __construct7($user_id, $user_name, $user_address, $user_email, $user_phone, $user_rol, $user_password)
    {
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
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    # Usuario: Nombre         
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }
    public function getUserName()
    {
        return $this->user_name;
    }
    # Usuario: Correo         
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }
    public function getUserEmail()
    {
        return $this->user_email;
    }
    # Usuario: Contraseña        
    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }
    public function getUserPassword()
    {
        return $this->user_password;
    }
    # Usuario: Direccion         
    public function setUserAddress($user_address)
    {
        $this->user_address = $user_address;
    }
    public function getUserAddress()
    {
        return $this->user_address;
    }
    # Usuario: Rol     
    public function setUserRol($user_rol)
    {
        $this->user_rol = $user_rol;
    }
    public function getUserRol()
    {
        return $this->user_rol;
    }
    # Usuario: Teléfono         
    public function setUserPhone($user_phone)
    {
        $this->user_phone = $user_phone;
    }
    public function getUserPhone()
    {
        return $this->user_phone;
    }

    // Métodos: Persistencia a la base de datos

    # Login
    public function Login()
    {
        try {
            $sql = 'SELECT * FROM USUARIOS
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
                    $userDb['user_state'],
                    $userDb['Id_rol']
                );
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
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
                    2 -- id del rol "Cliente"
                )';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':nombre', $this->getUserName(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->getUserEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':contraseña', $this->getUserPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':celular', $this->getUserPhone(), PDO::PARAM_STR);
        $stmt->bindValue(':direccion', $this->getUserAddress(), PDO::PARAM_STR);
        $stmt->execute();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

    
    # RF04_CU04 - Consultar Usuarios
    public function read_users()
    {
        try {
            $userList = [];
            // Incluye la tabla de roles y la unión con la tabla de usuarios
            $sql = 'SELECT u.*, r.nombre FROM USUARIOS u
                    JOIN ROL r ON u.id_rol = r.id_rol';
            $stmt = $this->dbh->query($sql);
    
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $userDb) {
                $userObj = new User();
                $userObj->setUserId($userDb['id_usuario']);
                $userObj->setUserName($userDb['nombre']);
                $userObj->setUserEmail($userDb['email']);
                $userObj->setUserPassword($userDb['contraseña']);
                $userObj->setUserPhone($userDb['celular']);
                $userObj->setUserAddress($userDb['direccion']);
                $userObj->setUserRol($userDb['nombre']); // Ajusta esto según el nombre del campo de rol
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
                    nombre = :UserName,
                    email = :UserEmail,
                    contraseña = :UserPassword,
                    celular = :UserPhone,
                    direccion = :UserAddress,
                    user_rol = :UserRole
                WHERE id_usuario = :UserCode';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':UserCode', $this->getUserId(), PDO::PARAM_INT);
        $stmt->bindValue(':UserName', $this->getUserName(), PDO::PARAM_STR);
        $stmt->bindValue(':UserEmail', $this->getUserEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':UserPassword', $this->getUserPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':UserPhone', $this->getUserPhone(), PDO::PARAM_STR);
        $stmt->bindValue(':UserAddress', $this->getUserAddress(), PDO::PARAM_STR);
        $stmt->bindValue(':UserRole', $this->getUserRol(), PDO::PARAM_INT); // Asume que el rol es un entero
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
