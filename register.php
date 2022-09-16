<?php session_start();
include('HTML/basesDeDatos/conexion2.php');
    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        $error = '';
        
        if (empty($correo) or empty($usuario) or empty($clave) or empty($clave2)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            
            $statement = $conexion->prepare('SELECT * FROM usuarios WHERE Nombre_Usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Este usuario ya existe</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO usuarios (ID_Usuario,Nombre,Apellido,Nombre_Usuario,Correo,Contraseña,Tipo_Usuario) 
            VALUES (null,:nombre,:apellido, :usuario, :correo, :clave,2)');
            $statement->execute(array(
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':usuario' => $usuario,
                ':correo' => $correo,
                ':clave' => $clave
                
            ));
            
         $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
                
        }
    }


    require 'frontend/register-vista.php';

?>
