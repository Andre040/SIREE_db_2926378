<?php
require_once "./models/user.php";
class Users
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    // Método para listar usuarios
    public function listUsers()
    {
        try {
            return $this->userModel->read_users();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar un usuario
    public function deleteUser($user_id)
    {
        try {
            $this->userModel->delete_User($user_id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para actualizar un usuario
    public function updateUser($user_id, $user_data)
    {
        try {
            $this->userModel->setUserId($user_id);
            $this->userModel->setUserName($user_data['name']);
            $this->userModel->setUserEmail($user_data['email']);
            $this->userModel->setUserPassword($user_data['password']);
            $this->userModel->setUserPhone($user_data['phone']);
            $this->userModel->setUserAddress($user_data['address']);
            $this->userModel->setUserRol($user_data['role']);
            $this->userModel->update_users();
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function createUser($user_data)
{
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


    // Método para obtener un usuario por su ID
    public function getUserById($user_id)
    {
        try {
            return $this->userModel->get_user_by_id($user_id);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
