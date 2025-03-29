<?php
require_once("/xampp/htdocs/crud_php/modelo/model.php");

class userController{
    private $userModel; // = 

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    // obtener todos los usuarios
    public function getUsers(){
        return $this->userModel->getUser();
    }

    // Funcion para agregar usuarios
    public function addUser($nombre,$apellido,$email){
        if ($this->userModel->addUser($nombre,$apellido,$email)){
            echo "usuario agregado exitosamente";
        }else{
            echo "Error al registrar usuario";
        }
    }

    public function deleteUser($id){
        if ($this->userModel->deleteUser($id)){
            echo "Usuario eliminado exitosamente";
        }else{
            echo "Error al eliminar usuario";
        }
    }
}
?>