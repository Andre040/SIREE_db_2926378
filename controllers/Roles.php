<?php
require_once "./models/Rol.php";
class Roles {
    private $RolModel;

    public function __construct($RolModel) {
        $this->RolModel = $RolModel;
    }

    // Método para listar roles
    public function listRol() {
        try {
            $roles = $this->RolModel->read_roles();
            return $roles;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar un rol
    public function deleteRol($rol_Id) {
        try {
            $this->RolModel->delete_Rol($rol_Id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para actualizar un rol
    public function updateRol($rol_Id, $rol_data) {
        try {
            $this->RolModel->setRolId($rol_Id);
            $this->RolModel->setRolName($rol_data['nombre']);
            $this->RolModel->update_roles();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para crear un rol
    public function createRol($rol_data) {
        try {
            $this->RolModel->setRolName($rol_data['nombre']);
            $this->RolModel->rol_create();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>
