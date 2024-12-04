<?php
// EquipoController.php
class Equipos {
    private $equipoModel;

    public function __construct($equipoModel) {
        $this->equipoModel = $equipoModel;
    }

    // Método para listar los equipos
    public function listEquipo() {
        try {
            $equipos = $this->equipoModel->listEquipo();
            return $equipos;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar un equipo
    public function deleteEquipo($equipo_id) {
        try {
            $this->equipoModel->deleteEquipo($equipo_id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para crear un equipo
    public function createEquipo($equipo_data) {
        try {
            $this->equipoModel->createEquipo(
                $equipo_data['nombre'],
                $equipo_data['categoria'],
                $equipo_data['valor_renta'],
                $equipo_data['estado'],
                $equipo_data['cantidad_disponible']
            );
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>
