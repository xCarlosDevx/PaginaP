<?php
 $servername =   'bxarti5uv4vopmmni1i0-mysql.services.clever-cloud.com';
 $username   =   'uq3vruf4b6lbifjl';
 $password   =   'GDyQwVjHOTrgS4biT74K';
 $dbname     =   "bxarti5uv4vopmmni1i0";
    try{
         $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username , $password);
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }
     

?>
