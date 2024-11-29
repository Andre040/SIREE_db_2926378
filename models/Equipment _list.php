<?php
// Nombra la clase
class Equipment_list
{

    // Atributos
    private $dbh;
    private $Equipement_id;
    private $Equipement_name;
    private $Equipement_category;
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
    # Constructor 03 parámetros
    public function __construct3($Equipement_id, $Equipement_name, $Equipement_category)
    {
        $this->$Equipement_id = $Equipement_id;
        $this->$Equipement_name = $Equipement_name;
        $this->$Equipement_category = $Equipement_category;
    }
    // Métodos setter y getter

    # Renta: Id
    public function setEquipementId($Equipement_id)
    {
        $this->Equipement_id = $Equipement_id;
    }
    public function getEquipementId()
    {
        return $this->Equipement_id;
    }
    # Renta: Nombre         
    public function setEquipementName($Equipement_name)
    {
        $this->Equipement_name = $Equipement_name;
    }
    public function getEquipementName()
    {
        return $this->Equipement_name;
    }
    # Renta: Fecha devolucion         
    public function setEquipementCategory($Equipement_category)
    {
        $this->Equipement_category = $Equipement_category;
    }
    public function getEquipementCategory()
    {
        return $this->Equipement_category;
    }
    // Crear (Create)
    public function equipement_create()
    {
        $sql = "INSERT INTO LISTADO_DE_EQUIPOS VALUES (:id_listado_equipo, :nombre, :categoria)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id_renta', $this->Equipement_id);
        $stmt->bindValue(':nombre', $this->Equipement_name);
        $stmt->bindValue(':categoria', $this->Equipement_category);
        $stmt->execute();
    }

        public function equipement_read(){
        try {
            $EquipementList = [];
            $sql = 'SELECT * FROM LISTADO_DE_EQUIPOS';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $rol) {
                $EquipementObj = new Equipment_list;
                $EquipementObj->setEquipementId($rol['id_listado_equipo']);
                $EquipementObj->setEquipementName($rol['nombre']);
                $EquipementObj->setEquipementCategory($rol['categoria']);
                array_push($EquipementList, $EquipementObj);
            }
            return $EquipementList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    // Actualizar(Update) 
    public function getrol_bycode($rolCode){
        try {
            $sql = "SELECT * FROM ROLES WHERE rol_code=:rolCode";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('rolCode', $rolCode);
            $stmt->execute();
            $rolDb = $stmt->fetch();
            $rol = new User;
            $rol->setRolCode($rolDb['rol_code']);
            $rol->setRolName($rolDb['rol_name']);
            return $rol;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    } // Eliminar (Delete) 
    public function delete($idListadoEquipo)
    {
        $sql = "DELETE FROM LISTADO_DE_EQUIPOS WHERE Id_listado_equipo = :id_listado_equipo";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id_listado_equipo', $idListadoEquipo);
        $stmt->execute();
    }
}
