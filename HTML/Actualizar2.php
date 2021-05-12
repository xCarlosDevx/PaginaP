<?php

include("basesDeDatos/conexion.php");

/*
if (isset($_POST['ACTUALIZAR'])) {
$id = $_GET['id'];                          */
$id = $_POST['Id'];
$NOMBRE_A = $_POST['Nombretxt'];
$APELLIDO_A = $_POST['Apellidotxt'];
$CORREO_A = $_POST['Correotxt'];
$USUARIO_A = $_POST['Nombre_Usuariotxt'];
$CONTRASEÑA_A = $_POST['Contraseñatxt'];
$TIPO_A = $_POST['Tipo_Usuariotxt'];

 

$query = "UPDATE usuarios SET Nombre='$NOMBRE_A', Apellido='$APELLIDO_A', Correo ='$CORREO_A',Nombre_Usuario='$USUARIO_A',Contraseña='$CONTRASEÑA_A', 
Tipo_Usuario='$TIPO_A' WHERE  ID_Usuario ='$id'";

$result = mysqli_query($conn, $query);
$_SESSION['message'] = 'Pedido actualizado correctamente';
$_SESSION['message_type'] = 'warning';

if($result) {
  
    header('Location: empleados.php');

}

?>