<?php 

require_once("../config/database.php");

$db = new Database();

$conexion = $db ->connect();

if($conexion){
    echo "Conexion exitosa";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>