<?php
require_once "./models/Rol.php";
class Roles {
    private $RolModel;

    public function __construct($RolModel) {
        $this->RolModel = $RolModel;
    }

    // Método para listar usuarios
    public function listRol() {
        try {
            $roles = $this->RolModel->read_roles();
            return $roles;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar un usuario
    public function deleteRol($rol_id) {
        try {
            $this->RolModel->delete_Rol($rol_id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para actualizar un usuario
    public function updateRol($rol_id, $rol_data) {
        try {
            $this->RolModel->setRolId($rol_id);
            $this->RolModel->setRolName($rol_data['nombre']);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function createRol($rol_data) { try { 
          $this->RolModel->setRolName($rol_data['nombre']);
         } catch (Exception $e) { echo json_encode(['error' => $e->getMessage()]);} }
      
    }

?>
