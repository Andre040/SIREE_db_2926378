<?php
require_once "./models/Computer.php";
class Computers {
    private $ComputerModel;

    public function __construct($ComputerModel) {
        $this->ComputerModel = $ComputerModel;
    }

    // Método para listar usuarios
    public function listComputer() {
        try {
            $Computers = $this->ComputerModel->Computer_Read();
            return $Computers;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar un usuario
    public function deleteComputer($Computer_id) {
        try {
            $this->ComputerModel->delete_Computer($Computer_id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para actualizar un usuario
    public function updateComputer($Computer_id, $Computer_data) {
        try {
            $this->ComputerModel->setComputerId($Computer_id);
            $this->ComputerModel->setComputerName($Computer_data['nombre']);
            $this->ComputerModel->setComputerCategory($Computer_data['categoria']);
            $this->ComputerModel->setComputerPriceRent($Computer_data['valor_renta']);
            $this->ComputerModel->setComputerStatus($Computer_data['estado']);
            $this->ComputerModel->setComputerAvailableQuantity($Computer_data['cantidad_disponible']);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function createComputer($Computer_data) { try { 
          $this->ComputerModel->setComputerName($Computer_data['nombre']);
          $this->ComputerModel->setComputerCategory($Computer_data['categoria']);
          $this->ComputerModel->setComputerPriceRent($Computer_data['valor_renta']);
          $this->ComputerModel->setComputerStatus($Computer_data['estado']);
          $this->ComputerModel->setComputerAvailableQuantity($Computer_data['cantidad_disponible']);
          $this->ComputerModel->Computer_create();
         } catch (Exception $e) { echo json_encode(['error' => $e->getMessage()]);} }
      
    }

?>
