<?php 

require_once("/xampp/htdocs/crud_php/controlador/userController.php");

$userController = new userController(); //instancia del controlador
$users = $userController->getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud php</title>
    <link rel="stylesheet" href="../assets/estilos/style.css">
</head>
<body>
    <h1>MVC with PHP by Angel Herrera</h1>
    <div class="form-container">
        <form action="" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="email" placeholder="E mail" required>
            <button type="submit" name="add">Agregar +</button>
    </div>
    <?php
    if(isset($_POST['add'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        
        $userController->addUser($nombre,$apellido,$email);
        header("Location: index.php");
    }
    ?>
    <div class="table-container">
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>E-mail</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($users as $user):
                ?>
                <tr>
                    <td><?php echo $user['nombre']?></td>
                    <td><?php echo $user['apellido']?></td>
                    <td><?php echo $user['email']?></td>
                    <td>
                        <a href="?delete=<?php echo $user['id'];?>" 
                        class="delete-btn" title="Eliminar este campo">Eliminar</a>
                    </td>
                </tr>  
                <?php endforeach;?>  
            </tbody>
        </table>
    </div>
    <?php
    //verificar si hizo click en el enlace de eliminar 
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $userController->deleteUser($id); // Eliminar el usuario de la base de datos
        header("Location: index.php"); // Redirigir para evitar el reenvío del formulario
    }
    ?>
</body>
</html>