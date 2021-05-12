<?php

include("basesDeDatos/conexion.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM usuarios WHERE ID_Usuario = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'pedido removido exitosamente';
  $_SESSION['message_type'] = 'danger';
  header("Location: empleados.php");
}

?>
