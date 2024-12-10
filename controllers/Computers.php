<?php
require_once "./models/Computer.php";

class Computers
{
    private $ComputerModel;

    public function __construct($ComputerModel)
    {
        $this->ComputerModel = $ComputerModel;
    }
    public function createComputer($Computer_data)
    {
        try {
            var_dump($Computer_data);
            $this->ComputerModel->setComputerName($Computer_data['nombre']);
            $this->ComputerModel->setComputerCategory($Computer_data['categoria']);
            $this->ComputerModel->setComputerPriceRent($Computer_data['valor_renta']);
            $this->ComputerModel->setComputerStatus($Computer_data['estado']);
            $this->ComputerModel->setComputerAvailableQuantity($Computer_data['cantidad_disponible']);
            $this->ComputerModel->Computer_create();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    // Método para listar computadoras
    public function listComputers()
    {
        try {
            return $this->ComputerModel->Computer_read();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar una computadora
    public function deleteComputer($Computer_id)
    {
        try {
            $this->ComputerModel->delete_Computer($Computer_id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    public function updateComputer($Computer_id, $Computer_data) {
        try {
            $this->ComputerModel->setComputerId($Computer_id);
            $this->ComputerModel->setComputerName($Computer_data['nombre']);
            $this->ComputerModel->setComputerCategory($Computer_data['categoria']);
            $this->ComputerModel->setComputerPriceRent($Computer_data['valor_renta']);
            $this->ComputerModel->setComputerStatus($Computer_data['estado']);
            $this->ComputerModel->setComputerAvailableQuantity($Computer_data['cantidad_disponible']);
            $this->ComputerModel->update_Computer();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}    