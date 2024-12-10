<?php
class Computer {
    private $dbh;
    private $Computer_id;
    private $Computer_name;
    private $Computer_category;
    private $Computer_price_rent;
    private $Computer_status;
    private $Computer_available_quantity;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    // Métodos setter y getter para las propiedades

    public function setComputerId($Computer_id) {
        $this->Computer_id = $Computer_id;
    }
    public function getComputerId() {
        return $this->Computer_id;
    }

    public function setComputerName($Computer_name) {
        $this->Computer_name = $Computer_name;
    }
    public function getComputerName() {
        return $this->Computer_name;
    }

    public function setComputerCategory($Computer_category) {
        $this->Computer_category = $Computer_category;
    }
    public function getComputerCategory() {
        return $this->Computer_category;
    }

    public function setComputerPriceRent($Computer_price_rent) {
        $this->Computer_price_rent = $Computer_price_rent;
    }
    public function getComputerPriceRent() {
        return $this->Computer_price_rent;
    }

    public function setComputerStatus($Computer_status) {
        $this->Computer_status = $Computer_status;
    }
    public function getComputerStatus() {
        return $this->Computer_status;
    }

    public function setComputerAvailableQuantity($Computer_available_quantity) {
        $this->Computer_available_quantity = $Computer_available_quantity;
    }
    public function getComputerAvailableQuantity() {
        return $this->Computer_available_quantity;
    }

    // Método para crear una computadora
    public function Computer_create() {
        try {
            $sql = "INSERT INTO EQUIPOS (nombre, categoria, valor_renta, estado, cantidad_disponible) VALUES (:nombre, :categoria, :valor_renta, :estado, :cantidad_disponible)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':nombre', $this->getComputerName());
            $stmt->bindValue(':categoria', $this->getComputerCategory());
            $stmt->bindValue(':valor_renta', $this->getComputerPriceRent());
            $stmt->bindValue(':estado', $this->getComputerStatus());
            $stmt->bindValue(':cantidad_disponible', $this->getComputerAvailableQuantity());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para leer computadoras
    public function Computer_read() {
        try {
            $ComputerList = [];
            $sql = 'SELECT * FROM EQUIPOS';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $Computer) {
                $ComputerObj = new Computer($this->dbh);
                $ComputerObj->setComputerId($Computer['id_equipo']);
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

    // Método para actualizar una computadora
    public function update_Computer() {
        try {
            $sql = 'UPDATE EQUIPOS SET nombre = :nombre, categoria = :categoria, valor_renta = :valor_renta, estado = :estado, cantidad_disponible = :cantidad_disponible WHERE id_equipo = :id_equipo';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id_equipo', $this->getComputerId());
            $stmt->bindValue(':nombre', $this->getComputerName());
            $stmt->bindValue(':categoria', $this->getComputerCategory());
            $stmt->bindValue(':valor_renta', $this->getComputerPriceRent());
            $stmt->bindValue(':estado', $this->getComputerStatus());
            $stmt->bindValue(':cantidad_disponible', $this->getComputerAvailableQuantity());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Método para eliminar una computadora
    public function delete_Computer($Computer_id) {
        try {
            $sql = 'DELETE FROM EQUIPOS WHERE id_equipo = :id_equipo';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id_equipo', $Computer_id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
