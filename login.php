<?php session_start();

include('HTML/basesDeDatos/conexion2.php');

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        $statement =$conexion->prepare("SELECT * FROM usuarios WHERE Nombre_Usuario = :usuario AND Contraseña = :clave");
        
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false AND $resultado['Tipo_Usuario'] == 1){
            $_SESSION['Nombre_Usuario'] = $usuario;
            header('location: HTML/empleados.php');
        }else
        if ($resultado['Tipo_Usuario'] == 2) {
            header('location: frontend/index.html');
           
        }else
        if ($resultado['Tipo_Usuario'] == 3) {
            header('location:  ');
           
        }else{
            $error .= '<i>Este usuario no existe o contraseña incorrecta</i>';
        }
    }
        
require 'frontend/login-vista.php';


?>