<?php
require_once './models/User.php';

class UserController {
    private $userModel;
    
    public function createUser($user_data) {
        try {
            $this->userModel->setUserName($user_data['name']);
            $this->userModel->setUserEmail($user_data['email']);
            $this->userModel->setUserPassword($user_data['password']);
            $this->userModel->setUserPhone($user_data['phone']);
            $this->userModel->setUserAddress($user_data['address']);
            $this->userModel->user_create();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    
    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function listUsers() {
        try {
            $users = $this->userModel->read_users();
            // No imprimir los datos aquí, solo devolverlos
            return $users;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    public function deleteUser($user_id) {
        try {
            $this->userModel->delete_User($user_id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

}
?>
