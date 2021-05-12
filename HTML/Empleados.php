<!DOCTYPE html>
<html lang="es">

<?php
include 'basesDeDatos/conexion.php';
$result = mysqli_query($conn, "SELECT * FROM usuarios where Tipo_Usuario ='1'");
$result2 = mysqli_query($conn, "SELECT IDPedido,IDFactura,`NCliente`, `ACliente`, `Producto`, `Precio`, `Cantidad`, `Direccion`, `FechaPedido`, `Total` FROM pedido");
$result3 = mysqli_query($conn, "SELECT* FROM usuarios where Tipo_Usuario ='2'");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

    <link rel="stylesheet" href="../CSS/Cajas4.css">
    <link rel="stylesheet" href="../CSS/EstilosBase.css">

    <title>Cooking Shop</title>

</head>

<script>
    function confirmar() {
        let respuesta = confirm('Esta seguro de eliminar este registro?');

        if (respuesta == true) {

            return true;
        } else {
            return false;
        }
    }
</script>

<header class="header">
    <div class="container logo-nav-container">
        <a href="#" class="logo">Cooking Shop </a>
        <span class="menu-icon">Ver menú</span>

        <nav class="navigation">
            <ul class="show">
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="Categorias.html">Categorias</a></li>
                <li><a href="Nosotros.html">Nosotros</a></li>
                <li><a href="Contáctanos.html">Contáctanos</a></li>
                <li><a href="Empleados.php">Empleados</a></li>
            </ul>
        </nav>
    </div>
</header>

<style>
    table.dataTable thead {
        background: linear-gradient(to right, #ffbf00, #ffc61a);
        color: black;
    }
</style>

<body>

    <br><br>
    <div class="container12">
        <div align="right">
            <a href="../actions/logout.php" class="btn btn-danger" id="log_out">Cerrar Sesion &nbsp </a>
        </div>
        <div class="container1" id='container1'>
            <h1 class="text-center">Listado de Empleados</h1>
            <div class="row">
                <div class="col-lg-12">
                    <table id="tablaEmpleados" class="table table-striped  border    table-bordered dataTable"
                        style="width:100%">
                        <br><br>

                        <div style="display: flex; justify-content: flex-end">
                            <a style="margin-right: 10px;" id="boton1" class="btn btn-success"> Insertar &nbsp
                                <i class="fas fa-plus"></i>
                            </a>

                            <a id="abrir" class="btn btn-primary">Editar &nbsp
                            </a>
                        </div>
                        <br>
                        <thead class="text-center">
                            <tr>
                                <th>ID de Usuario</th>
                                <th>Nombre de Empleado</th>
                                <th>Apellido de Empleado</th>
                                <th>Usuario</th>
                                <th>acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['ID_Usuario']; ?></td>
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['Apellido']; ?></td>
                                <td><?php echo $row['Nombre_Usuario']; ?></td>
                                <td>

                                    <a href="empleados.php?id=<?php echo $row['ID_Usuario']?>" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>




                                    <?php
                               
                               
                               if  (isset($_GET['id'])) {
                                   $id = $_GET['id'];
                                   $query ="SELECT * FROM usuarios WHERE ID_Usuario =$id";
                                $consulta = mysqli_query($conn, $query);
                                if (mysqli_num_rows($consulta) == 1) {
                                    $show = mysqli_fetch_array($consulta);
                                    $NOMBRE = $show['Nombre'];
                                    $APELLIDO = $show['Apellido'];
                                    $CORREO = $show['Correo'];
                                    $USUARIO = $show['Nombre_Usuario'];
                                    $CONTRASEÑA = $show['Contraseña'];
                                    $TIPO = $show['Tipo_Usuario'];
                                  
                                    }
                                }

                                ?>
                                    <a href="eliminar.php?id=<?php echo $row['ID_Usuario']?>" class="btn btn-danger"
                                        onclick="return confirmar();">
                                        <i class="fas fa-minus-circle"></i>
                                    </a>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <br>
            <div class="contenido" id="contenido">
                <style>
                    .input {
                        margin-right: 10px;
                        margin-top: 5px;

                    }
                </style>
                <h2>Insertar Datos</h2>
                <form action="guardar.php" method="POST">
                    <br>

                    <input class="input" type="text" name="Nombretxt" value="<?php echo $NOMBRE; ?>"
                        placeholder="Nombre de Empleado">
                    <input class="input" type="text" name="Apellidotxt" value="<?php echo $APELLIDO; ?>"
                        placeholder="Apellido de Empleado">
                    <input class="input" type="text" name="Usuariotxt" value="<?php echo $USUARIO; ?>"
                        placeholder="Usuario">
                    <input class="input" type="text" name="Correotxt" value="<?php echo $CORREO; ?>"
                        placeholder="Correo">
                    <input class="input" type="password" name="Contratxt" value="<?php echo $CONTRASEÑA; ?>"
                        placeholder="Contraseña">
                    <input class="input" type="text" name="Tipotxt" value="<?php echo $TIPO; ?>"
                        placeholder="Tipo de usuario">

                    <button name="Enviar">Guardar </button>

                </form>

            </div>

        </div>

        <div class="container2" id='container2'>
            <h1 class="text-center">Listado de Pedidos</h1>
            <div class="row">
                <div class="col-lg-12">
                    <table id="tablaPedidos" class="table table-striped  border    table-bordered dataTable"
                        style="width:100%">
                        <br><br>
                        <div style="display: flex; justify-content: flex-end">
                            <a style="margin-right: 10px;"  id="boton2" class="btn btn-success"> Insertar &nbsp
                                <i class="fas fa-plus"></i>
                                <a id="abrir3" class="btn btn-primary">Editar &nbsp
                            </a>
                        </div>
                        <br>
                        <thead class="text-center">
                            <tr>
                                <th>ID Factura</th>
                                <th>Nombre del cliente</th>
                                <th>Apellido del cliente</th>
                                <th>Productos</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Direccion</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                      

                        while ($row = mysqli_fetch_array($result2)) {
                        ?>
                            <tr>
                                <td><?php echo $row['IDFactura'] ?></td>
                                <td><?php echo $row['NCliente'] ?></td>
                                <td><?php echo $row['ACliente'] ?></td>
                                <td><?php echo $row['Producto'] ?></td>
                                <td><?php echo $row['Precio'] ?></td>
                                <td><?php echo $row['Cantidad'] ?></td>
                                <td><?php echo $row['Direccion'] ?></td>
                                <td><?php echo $row['FechaPedido'] ?></td>
                                <td><?php echo $row['Total'] ?></td>
                                <td>

                                    <a href="empleados.php?id=<?php echo $row['IDFactura']?>" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <?php
                               
                               
                               if  (isset($_GET['id'])) {
                                   $id = $_GET['id'];
                                   $query ="SELECT * FROM pedido WHERE IDFactura =$id";
                                $consulta = mysqli_query($conn, $query);
                                if (mysqli_num_rows($consulta) == 1) {
                                    $show = mysqli_fetch_array($consulta);
                                
                                  $NOMBRE_C = $show['NCliente'] ;
                                $APELLIDO_C = $show['ACliente']; 
                                 $PRODUCTO= $show['Producto']; 
                               $PRECIO = $show ['Precio'] ;
                                $CANTIDAD = $show ['Cantidad'] ;
                                  $DIRECCION= $SHow['Direccion'] ;
                                   $FECHA = $SHow['FechaPedido'] ;
                                     $TOTAL = $SHow['Total']; 
                                  
                                    }
                                }

                                ?>
                                    </a>
                                    <a href="eliminar.php?id=<?php echo $row['IDFactura']?>" class="btn btn-danger"
                                        onclick="return confirmar();">
                                        <i class="fas fa-minus-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="contenido " id="contenido3">
                <style>
                    .input {
                        margin-right: 10px;
                        margin-top: 5px;

                    }
                </style>
                <h2>Insertar Datos</h2>
                <form action="guardar.php" method="POST">
                    <br>

                    <input class="input" type="text" name="Nombretxt" value="<?php echo $NOMBRE_C; ?>"
                        placeholder="Nombre">
                    <input class="input" type="text" name="Apellidotxt" value="<?php echo $APELLIDO_C; ?>"
                        placeholder="Apellido">
                    <input class="input" type="text" name="Productotxt" value="<?php echo $PRODUCTO; ?>"
                        placeholder="Producto">
                    <input class="input" type="text" name="Preciotxt" value="<?php echo $PRECIO; ?>"
                        placeholder="Precio">
                    <input class="input" type="text" name="Cantidadtxt" value="<?php echo  $CANTIDAD; ?>"
                        placeholder="Cantidad">
                    <input class="input" type="text" name="Direcciontxt" value="<?php echo  $DIRECCION; ?>"
                        placeholder="Direccion">
                    <input class="input" type="datetime-local" name="Fechatxt" value="<?php echo   $FECHA; ?>"
                        placeholder="Fecha">
                    <input class="input" type="text" name="Totaltxt" value="<?php echo  $TOTAL; ?>" placeholder="Total">

                    <button name="Enviar">Guardar </button>

                </form>

            </div>

        </div>

        <div class="container3" id='container3'>
            <h1 class="text-center">Listado de Usuarios</h1>
            <div class="row">
                <div class="col-lg-12">
                <table id="tablaUsuarios" class="table table-striped  border    table-bordered dataTable"
                        style="width:100%">
                        <br><br>
                        <div style="display: flex; justify-content: flex-end">
                            <a style="margin-right: 10px;" id="boton3" class="btn btn-success"> Insertar &nbsp
                                <i class="fas fa-plus"></i>
             
                            <a id="abrir2" class="btn btn-primary">Editar &nbsp
                            </a>
                        </div>
                        <br>
                        <thead class="text-center">
                            <tr>
                                <th>ID de Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Nombre_Usuario</th>
                                <th>acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                        while ($row = mysqli_fetch_array($result3)) {    ?>
                            <tr>
                                <td><?php echo $row['ID_Usuario'] ?></td>
                                <td><?php echo $row['Nombre'] ?></td>
                                <td><?php echo $row['Apellido'] ?></td>
                                <td><?php echo $row['Correo'] ?></td>
                                <td><?php echo $row['Nombre_Usuario'] ?></td>
                                <td>
                                    <a href="empleados.php?id=<?php echo $row['ID_Usuario']?>" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <?php
                               
                               
                               if  (isset($_GET['id'])) {
                                   $id = $_GET['id'];
                                   $query ="SELECT * FROM usuarios WHERE ID_Usuario =$id";
                                $consulta = mysqli_query($conn, $query);
                                if (mysqli_num_rows($consulta) == 1) {
                                    $show = mysqli_fetch_array($consulta);
                                    $NOMBRE = $show['Nombre'];
                                    $APELLIDO = $show['Apellido'];
                                    $CORREO = $show['Correo'];
                                    $USUARIO = $show['Nombre_Usuario'];
                                    $CONTRASEÑA = $show['Contraseña'];
                                    $TIPO = $show['Tipo_Usuario'];
                                  
                                    }
                                }

                                ?>
                                    <a href="eliminar.php?id=<?php echo $row['ID_Usuario']?>" class="btn btn-danger"
                                        onclick="return confirmar();">
                                        <i class="fas fa-minus-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <?php
                        // close connection database
                        mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </div>
            <br>
            <div class="contenido" id="contenido2">
                <style>
                    .input {
                        margin-right: 10px;
                        margin-top: 5px;

                    }
                </style>
                <h2>Insertar Datos</h2>
                <form action="guardar.php" method="POST">
                    <br>

                    <input class="input" type="text" name="Nombretxt" value="<?php echo $NOMBRE; ?>"
                        placeholder="Nombre">
                    <input class="input" type="text" name="Apellidotxt" value="<?php echo $APELLIDO; ?>"
                        placeholder="Apellido">
                    <input class="input" type="text" name="Usuariotxt" value="<?php echo $USUARIO; ?>"
                        placeholder="Usuario">
                    <input class="input" type="text" name="Correotxt" value="<?php echo $CORREO; ?>"
                        placeholder="Correo">
                    <input class="input" type="text" name="Contratxt" value="<?php echo $CONTRASEÑA; ?>"
                        placeholder="Contraseña">
                    <input class="input" type="text" name="Tipotxt" value="<?php echo $TIPO; ?>"
                        placeholder="Tipo de usuario">

                    <button name="Enviar">Guardar </button>

                </form>

            </div>
        </div>

        <div class="container1">
            <br>
            <button id="btn1" class="btn btn-warning">Empleado </button>
            <button id="btn2" class="btn btn-warning">Pedidos </button>
            <button id="btn3" class="btn btn-warning">Usuarios </button>
            <br> <br> <br>
        </div>
    </div>


    <!-- Modal -->

    <div id="miModal" class="modal">
        <div class="flex" id="flex">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <h2 class="h2">Actualizar Registros</h2>
                    <span class="close" id="close"> &times; </span>
                </div>

                <form action="Actualizar2.php?id=<?php echo $_GET['ID_Usuario']; ?>" method="POST">

                    <input type="hidden" name="Id" value=" <?php echo $id; ?> ">
                    <div class="modal-body">
                        Nombre de Empleado:
                        <input class="imput_controls" type="text" name="Nombretxt" value="<?php echo $NOMBRE; ?>">
                        Apellido de Empleado:
                        <input class="imput_controls" type="text" name="Apellidotxt" value="<?php echo $APELLIDO; ?>">
                        Correo:
                        <input class="imput_controls" type="text" name="Correotxt" value="<?php echo $CORREO; ?>">
                        Usuario:
                        <input class="imput_controls" type="text" name="Nombre_Usuariotxt"
                            value="<?php echo $USUARIO; ?>">
                        Contraseña:
                        <input class="imput_controls" type="password" name="Contraseñatxt"
                            value="<?php echo $CONTRASEÑA; ?>">
                        Tipo de usuario:
                        <input class="imput_controls" type="text" name="Tipo_Usuariotxt" value="<?php echo $TIPO; ?>">

                        <button class="BotonC" name="ACTUALIZAR">Insertar </button>
                        </button>
                </form>

            </div>
        </div>
    </div>
    </div>

    <!-- Fin de Modal -->


    <script src="../JS/ocultar.js"></script>
    <script src="../JS/Prueba.js"></script>
    <!-- Optional JavaScript -->

    <script src="https://kit.fontawesome.com/5b5afdece7.js" crossorigin="anonymous"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <!--    Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#tablaEmpleados').DataTable();
            $('#tablaPedidos').DataTable();
            $('#tablaUsuarios').DataTable();
        });
    </script>

</body>

</html>