<?php
// Nombra la clase
class Rol {
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

    // Constructor con 2 parámetros
    public function __construct2($rol_id, $rol_name){
        $this->rol_id = $rol_id;            
        $this->rol_name = $rol_name;            
    }

    // Métodos setter y getter
    public function setRolId($rol_id){
        $this->rol_id = $rol_id;
    }

    public function getRolId(){
        return $this->rol_id;
    }

    public function setRolName($rol_name){
        $this->rol_name = $rol_name;
    }

    public function getRolName(){
        return $this->rol_name;
    }

    // Método para crear un rol
    public function rol_create() {
        try {
            $sql = 'INSERT INTO ROL (nombre) VALUES (:nombre)';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':nombre', $this->getRolName());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function read_roles() {
        try {
            $rolList = [];
            $sql = 'SELECT * FROM ROL';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $rolDb) {
                $rolObj = new Rol();
                $rolObj->setRolId($rolDb['Id_rol']); // Usar 'id_rol' como nombre de la columna
                $rolObj->setRolName($rolDb['nombre']); // Usar 'nombre' como nombre de la columna
                array_push($rolList, $rolObj);
            }
            return $rolList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function update_roles() {
        try {
            $sql = 'UPDATE ROL SET nombre = :RolName WHERE Id_rol = :RolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':RolCode', $this->getRolId());
            $stmt->bindValue(':RolName', $this->getRolName());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete_Rol($rol_id) {
        try {
            $sql = 'DELETE FROM ROL WHERE Id_rol = :RolCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':RolCode', $rol_id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
