<?php
// Nombra la clase
class Computer
{

    // Atributos
    private $dbh;
    private $Computer_id;
    private $Computer_name;
    private $Computer_category;
    private $Computer_price_rent;
    private $Computer_status;
    private $Computer_available_quantity;
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
    # Constructor 06 parámetros
    public function __construct6($Computer_id, $Computer_name, $Computer_category, $Computer_price_rent, $Computer_status, $Computer_available_quantity)
    {
        $this->Computer_id = $Computer_id;
        $this->Computer_name = $Computer_name;
        $this->Computer_category = $Computer_category;
        $this->Computer_price_rent = $Computer_price_rent;
        $this->Computer_status = $Computer_status;
        $this->Computer_available_quantity = $Computer_available_quantity;
    }
    // Métodos setter y getter

    # Computador: Id
    public function setComputerId($Computer_id)
    {
        $this->Computer_id = $Computer_id;
    }
    public function getComputerId()
    {
        return $this->Computer_id;
    }
    # Computador: Nombre         
    public function setComputerName($Computer_name)
    {
        $this->Computer_name = $Computer_name;
    }
    public function getComputerName()
    {
        return $this->Computer_name;
    }
    # Computador: Categoria         
    public function setComputerCategory($Computer_category)
    {
        $this->Computer_category = $Computer_category;
    }
    public function getComputerCategory()
    {
        return $this->Computer_category;
    }
    # Computador: Precio de renta         
    public function setComputerPriceRent($Computer_price_rent)
    {
        $this->Computer_price_rent = $Computer_price_rent;
    }
    public function getComputerPriceRent()
    {
        return $this->Computer_price_rent;
    }
    # Computador: estado  
    public function setComputerStatus($Computer_status)
    {
        $this->Computer_status = $Computer_status;
    }
    public function getComputerStatus()
    {
        return $this->Computer_status;
    }
    # Computador: Cantidad disponible   
    public function setComputerAvailableQuantity($Computer_available_quantity)
    {
        $this->Computer_available_quantity = $Computer_available_quantity;
    }
    public function getComputerAvailableQuantity()
    {
        return $this->Computer_available_quantity;
    }
    // Crear (Create)
    public function Computer_create()
    {
        $sql = "INSERT INTO EQUIPOS VALUES (:id_equipo, :nombre, :categoria, :valor_renta, : estado, :cantidad_dispoible)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id_Computador', $this->Computer_id);
        $stmt->bindValue(':nombre', $this->Computer_name);
        $stmt->bindValue(':categoria', $this->Computer_category);
        $stmt->bindValue(':valor_renta', $this->Computer_price_rent);
        $stmt->bindValue(':estado', $this->Computer_status);
        $stmt->bindValue(':cantidad_disponible', $this->Computer_available_quantity);
        $stmt->execute();
    }

    public function Computer_read()
    {
        try {
            $ComputerList = [];
            $sql = 'SELECT * FROM EQUIPOS';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $Computer) {
                $ComputerObj = new Computer;
                $ComputerObj->setComputerName($Computer['nombre']);
                $ComputerObj->setComputerCategory($Computer['categoria']);
                $ComputerObj->setComputerPriceRent($Computer['valor_renta']);
                $ComputerObj->setComputerStatus($Computer['estado']);
                $ComputerObj->setComputerAvailableQuantity($Computer['cantidad_disponible']);
                array_push($ComputerList, $ComputerObj);
            }
            return $ComputerList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function update_Computer()
    {
        try {
            $sql = 'UPDATE Equipos SET
                    nombre = :ComputerName,
                    categoria = :ComputerCategory,
                    valor_renta = :ComputerPriceRent,
                    estado = :ComputerStatus,
                    cantidad_disponible = :ComputerAvalaibleQuantity,
                WHERE id_equipo = :ComputerCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':ComputerCode', $this->getComputerId());
            $stmt->bindValue(':ComputerName', $this->getComputerName());
            $stmt->bindValue(':ComputerCategory', $this->getComputerCategory());
            $stmt->bindValue(':ComputerPriceRent', $this->getComputerPriceRent());
            $stmt->bindValue(':ComputerStatus', $this->getComputerStatus());
            $stmt->bindValue(':ComputerAvailaibleQuantity', $this->getComputerAvailableQuantity());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function delete_Computer($Computer_id)
    {
        try {
            $sql = 'DELETE FROM EQUIPOS WHERE id_equipo = :ComputerCode';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':ComputerCode', $Computer_id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}


