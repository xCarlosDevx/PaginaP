
<?php

include('basesDeDatos/conexion.php');

if (isset($_POST['Enviar'])) {
 
  $NOMBRE_A = $_POST['Nombretxt'];
  $APELLIDO_A= $_POST['Apellidotxt'];
  $USUARIO_A = $_POST['Usuariotxt']; 
  $CORREO_A = $_POST['Correotxt'];
  $CONTRASEÑA_A = $_POST['Contratxt'];
  $TIPO_A = $_POST['Tipotxt'];
  $query = "INSERT INTO `usuarios`( `Nombre`, `Apellido`, `Nombre_Usuario`, `Correo`, `Contraseña`, `Tipo_Usuario`) 
VALUES ('$NOMBRE_A','$APELLIDO_A','$USUARIO_A','$CORREO_A','$CONTRASEÑA_A','$TIPO_A')";
  
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.". mysqli_error($conn));
  }

  $_SESSION['message'] = 'Tu peticion se ha realizado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location:empleados.php');

}

?>
