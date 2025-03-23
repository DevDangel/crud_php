<?php
require_once("C:/xampp/htdocs/crud_php/config/database.php"); //Mi ruta: C:\xampp\htdocs\crud_php\config/database.php
//angel: SELECT(WHERE) INSERT, || eduard : UPDATE and DELETE
class userModel{
    private $conn;

    public function __construct(){ // = true
        $database = new Database();
        $this->conn = $database->connect();
    }//NOTA: este constructor tiene la conexion a la bd 

    // Listar todos los rows
    public function getUser(){
        
        $query = "SELECT * FROM personas ORDER BY id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // true || false
    }

    //Listar rows con condicion WHERE NOTA: login
    public function validateUser($email,$password){
        $query = "SELECT * FROM persona WHERE email = :email"; // SELECT * FROM persona WHERE email = angel18@gmail.com = true
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($user && $password === $user['NOTA PONER VALOR']){
            return $user;
        }
        return false;
    }

    public function addUser($nombre,$apellido,$email){
        $query = "INSERT INTO personas (nombre,apellido,email) VALUES (:nombre,:apellido,:email)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellido",$apellido);
        $stmt->bindParam(":email",$email);

        if($stmt->execute()){
            return true;
        }
        return false;

    }

    public function updateUser($id,$nombre,$apellido,$email){
        $query = "UPDATE personas SET nombre = :nombre, apellido = :apellido, email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellido",$apellido);
        $stmt->bindParam(":email",$email);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function deleteUser($id){
        $query = "DELETE FROM personas WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}

?>