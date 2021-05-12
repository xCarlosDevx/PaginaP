
<?php
 
$servername =   'localhost';
$username   =   "CarlosDBB";
$password   =   'carlosalejandro2003';
$dbname     =   "cliente_c";
 
$conexion = null;
try{
     $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username , $password);
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }
    echo ("Conexion exitosa");

?>
