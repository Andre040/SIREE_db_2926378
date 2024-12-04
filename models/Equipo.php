<?php
// Equipo.php
class Equipo
{
    private $dbh;
    private $id_equipo;
    private $Equipo_nombre;
    private $Equipo_categoria;
    private $Equipo_valor_renta;
    private $Equipo_estado;
    private $Equipo_cantidad_disponible;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    // Constructor con 6 parámetros
    public function __construct6($id_equipo, $Equipo_nombre, $Equipo_categoria, $Equipo_valor_renta, $Equipo_estado, $Equipo_cantidad_disponible)
    {
        $this->id_equipo = $id_equipo;
        $this->Equipo_nombre = $Equipo_nombre;
        $this->Equipo_categoria = $Equipo_categoria;
        $this->Equipo_valor_renta = $Equipo_valor_renta;
        $this->Equipo_estado = $Equipo_estado;
        $this->Equipo_cantidad_disponible = $Equipo_cantidad_disponible;
    }

    // Métodos setter y getter
    public function setEquipoId($id_equipo)
    {
        $this->id_equipo = $id_equipo;
    }

    public function getEquipoId()
    {
        return $this->id_equipo;
    }

    public function setEquipoNombre($Equipo_nombre)
    {
        $this->Equipo_nombre = $Equipo_nombre;
    }

    public function getEquipoNombre()
    {
        return $this->Equipo_nombre;
    }

    public function setEquipoCategoria($Equipo_categoria)
    {
        $this->Equipo_categoria = $Equipo_categoria;
    }

    public function getEquipoCategoria()
    {
        return $this->Equipo_categoria;
    }

    public function setEquipoValorRenta($Equipo_valor_renta)
    {
        $this->Equipo_valor_renta = $Equipo_valor_renta;
    }

    public function getEquipoValorRenta()
    {
        return $this->Equipo_valor_renta;
    }

    public function setEquipoEstado($Equipo_estado)
    {
        $this->Equipo_estado = $Equipo_estado;
    }

    public function getEquipoEstado()
    {
        return $this->Equipo_estado;
    }

    public function setEquipoCantidadDisponible($Equipo_cantidad_disponible)
    {
        $this->Equipo_cantidad_disponible = $Equipo_cantidad_disponible;
    }

    public function getEquipoCantidadDisponible()
    {
        return $this->Equipo_cantidad_disponible;
    }

    // Crear un nuevo equipo
    public function createEquipo($Equipo_nombre, $Equipo_categoria, $Equipo_valor_renta, $Equipo_estado, $Equipo_cantidad_disponible)
    {
        try {
            $sql = "INSERT INTO EQUIPOS (nombre, categoria, valor_renta, estado, cantidad_disponible) 
                    VALUES (:nombre, :categoria, :valor_renta, :estado, :cantidad_disponible)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':nombre', $Equipo_nombre);
            $stmt->bindParam(':categoria', $Equipo_categoria);
            $stmt->bindParam(':valor_renta', $Equipo_valor_renta);
            $stmt->bindParam(':estado', $Equipo_estado);
            $stmt->bindParam(':cantidad_disponible', $Equipo_cantidad_disponible);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            die("Error al crear el equipo: " . $e->getMessage());
        }
    }

    // Listar todos los equipos
    public function listEquipo()
    {
        try {
            $Equipolista = [];
            $sql = "SELECT * FROM EQUIPOS";
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $EquiposDB) {
                $EquiposObj = new Equipo();
                $EquiposObj->setEquipoId($EquiposDB['id_equipo']); // Usar 'id_equipo' como nombre de la columna
                $EquiposObj->setEquipoNombre($EquiposDB['nombre']); // Usar 'nombre' como nombre de la columna
                $EquiposObj->setEquipoCategoria($EquiposDB['categoria']); // Usar 'categoria' como nombre de la columna
                $EquiposObj->setEquipoValorRenta($EquiposDB['valor_renta']); // Usar 'valor_renta' como nombre de la columna
                $EquiposObj->setEquipoEstado($EquiposDB['estado']); // Usar 'estado' como nombre de la columna
                $EquiposObj->setEquipoCantidadDisponible($EquiposDB['cantidad_disponible']); // Usar 'cantidad_disponible' como nombre de la columna
                array_push($Equipolista, $EquiposObj);
            }
            return $Equipolista;
        } catch (Exception $e) {
            die("Error al listar los equipos: " . $e->getMessage());
        }
    }

    // Actualizar un equipo
    public function update_equipos($id_equipo, $Equipo_nombre, $Equipo_categoria, $Equipo_valor_renta, $Equipo_estado, $Equipo_cantidad_disponible)
    {
        try {
            $sql = 'UPDATE EQUIPOS SET nombre = :nombre, categoria = :categoria, valor_renta = :valor_renta, estado = :estado, cantidad_disponible = :cantidad_disponible WHERE id_equipo = :id_equipo';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id_equipo', $id_equipo, PDO::PARAM_INT);
            $stmt->bindValue(':nombre', $Equipo_nombre, PDO::PARAM_STR);
            $stmt->bindValue(':categoria', $Equipo_categoria, PDO::PARAM_STR);
            $stmt->bindValue(':valor_renta', $Equipo_valor_renta, PDO::PARAM_STR);
            $stmt->bindValue(':estado', $Equipo_estado, PDO::PARAM_STR);
            $stmt->bindValue(':cantidad_disponible', $Equipo_cantidad_disponible, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            die("Error al actualizar el equipo: " . $e->getMessage());
        }
    }

    // Eliminar un equipo
    public function deleteEquipo($equipo_id)
    {
        try {
            $sql = "DELETE FROM EQUIPOS WHERE id_equipo = :id_equipo";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id_equipo', $equipo_id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            die("Error al eliminar el equipo: " . $e->getMessage());
        }
    }
}
?>
