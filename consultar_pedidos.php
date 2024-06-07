<?php
include_once "BD/actualizar.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT DISTINCT pedido.id_pedido, pedido.estado, pedido.fecha, producto.id_producto ,cliente.id_cliente, cliente.nombre
                FROM pedido
                LEFT JOIN cliente ON pedido.cliente_id_cliente = cliente.id_cliente
                LEFT JOIN producto ON pedido.producto_id_producto = producto.id_producto;";
                
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consultar Productos</title>

    <!-- Custom fonts for this template -->
    <link href="icons/font/bootstrap-icons.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-shop"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sabores & delicias </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - HOME -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="bi bi-house-door"></i>
                    <span>HOME</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - productos-- Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-cake2-fill"></i>
                    <span>Productos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="consultar_productos.php">Consultar productos</a>
                        <a class="collapse-item" href="agregar_producto.php">Agregar producto</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - proveedores-- Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Proveedores</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="consultar_proveedores.php">Consultar proveedores</a>
                        <a class="collapse-item" href="agregar_proveedor.php">Agregar proveedor</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Inventario -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario"
                    aria-expanded="true" aria-controls="collapseInventario">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Inventario</span>
                </a>
                <div id="collapseInventario" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="consultar_inventario.php">Consultar Inventario</a>

                    </div>
                </div>
            </li>


            <!-- Nav Item - Empleados -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-person-fill-lock"></i>
                    <span>Empleados</span></a>
                <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                        <a class="collapse-item" href="utilities-color.html">Crear Empleado</a>
                        <a class="collapse-item" href="utilities-border.html">Consultar Empleado</a>
                        <a class="collapse-item" href="utilities-animation.html">Modificar Empleado</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - venta -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-currency-dollar"></i>
                    <span>Venta</span></a>
            </li>

            <!-- Nav Item - Cliente -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-people-fill"></i>
                    <span>Clientes</span></a>
            </li>

            <!-- Nav Item - pedidos -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePedidos"
                    aria-expanded="true" aria-controls="collapsePedidos">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Pedidos</span>
                </a>
                <div id="collapsePedidos" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="consultar_pedidos.php">Consultar pedidos</a>

                    </div>
                </div>
            </li>


            <!-- Nav Item - tienda -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-calendar3"></i>
                    <span>Tienda</span></a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6>-->
                        <a class="collapse-item" href="">Crear tienda</a>
                        <a class="collapse-item" href="">Consultar Tienda</a>
                        <a class="collapse-item" href="">Modificar Tienda</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/shop.svg" alt="...">
                <p class="text-center mb-2"><strong>Sabores & delicias</strong>, Frescura y sabor en cada empaque</p>

            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!--<form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="buscar"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <!--<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>-->
                        </li>

                    </ul>

                </nav>
                <!-- End of topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h2 class="m-0 font-weight-bold text-primary text-center">Consultar pedido</h1>


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <!--<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>-->
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Numero de Pedido</th>
                                                <th>Estado de pedido</th>
                                                <th>Fecha de Pedido</th>
                                                <th>Id cliente</th>
                                                <th>Cliente</th>
                                                <th>Entregar</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="text-center">
                                            <tr>
                                                <th>Numero de Pedido</th>
                                                <th>Estado de pedido</th>
                                                <th>Fecha de Pedido</th>
                                                <th>Id cliente</th>
                                                <th>Cliente</th>
                                                <th>Entregar</th>

                                            </tr>
                                        </tfoot>

                                        <?php
                                        $id = 0; // Inicializa $id fuera del bucle
                                        
                                        foreach ($data as $dat) {
                                            echo "<tr class='text-center'>";
                                            echo "<td>" . $dat['id_pedido'] . "</td>";
                                            echo "<td>" . $dat['estado'] . "</td>";
                                            echo "<td>" . $dat['fecha'] . "</td>";

                                            echo "<td>" . $dat['id_cliente'] . "</td>";
                                            echo "<td>" . $dat['nombre'] . "</td>";
                                            echo "<td>
        <div class='text-center'>
            <div class='btn-group'>
                <form method='get'>
                    <input type='hidden' name='fecha' value='" . $dat['fecha'] . "' />
                    <input type='hidden' name='nom' value='" . $dat['nombre'] . "' />
                    <input type='hidden' name='id_pedido' value='" . $dat['id_pedido'] . "' />
                    <input type='hidden' name='id_cliente' value='" . $dat['id_cliente'] . "' />
                    <input type='hidden' name='id_producto' value='" . $dat['id_producto'] . "' />

                    <button name='agregar' type='submit' class='btn btn-primary'><span class='text'>Elegir</span></button>

                </div>
                    </form>
            </div>
        </div>
        
    </td>";

                                            echo "</tr>";
                                        }
                                        echo "<a class='btn btn-primary' href='#' data-toggle='modal' data-target='#logoutModal'>
                                        <span>Entregar pedido</span>
                                        </a>
                                        <br>";
                                        $id = 0;
                                        if (isset($_GET['agregar'])) {
                                            $fecha = $_GET['fecha'];
                                            $id = $_GET['id_pedido'];
                                            $id_cliente = $_GET['id_cliente'];
                                            $nombre = $_GET['nom'];

                                            echo "A elegido el pedido: ";
                                            echo $id;

                                            // Código para actualizar la base de datos
                                        


                                            if ($resultado) {
                                                $response = array('success' => true, 'message' => 'Actualización exitosa');
                                            } else {
                                                $response = array('success' => false, 'message' => 'Error en la actualización');
                                            }

                                            // Devolver la respuesta en formato JSON
                                        }

                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div id="miSubventana" class="subventana">
                <span class="cerrar" onclick="cerrarVentana()">x</spa>

            </div>
            <script>
                document.getElementById("mostrarVentana").addEventListener("click", function () {
                    document.getElementById("miSubventana").style.display = "block";
                });

                function cerrarVentana() {
                    document.getElementById("miSubventana").style.display = "none";
                }

            </script>
            </tbody>
            </table>
        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Sabores & delicias 2024</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->



    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        function actualizarPagina() {
            location.reload(); // Recargar la página
        }
    </script>


    <!-- Script de jQuery -->
    <script>
        $(document).ready(function () {
            $('#showModalBtn').click(function () {
                $('#logoutModal').modal('show');
            });
        });
    </script>

    <!-- Contenido de la subventana modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="my-order">
                    <div class="my-order-container">
                        <div class="my-order-content">
                            <div class="order">
                                <p>
                                    <?php echo "<span>" . 'fecha : ' . "</span>";
                                    echo "<span>" . $fecha . "</span>";
                                    echo "<br>";

                                    ?>
                                    <?php echo "<span>" . 'Id : ' . "</span>";
                                    echo "<span>" . $id . "</span>";
                                    echo "<br>";

                                    ?>
                                    <?php echo "<span>" . 'Nombre : ' . "</span>";
                                    echo "<span>" . $nombre . "</span>";
                                    echo "<br>";

                                    ?>
                                    <?php
                                    $consul = "SELECT 
                pedido.cantidad, 
                producto.img, 
                producto.nombre, 
                cliente.id_cliente,
                pedido.producto_id_producto
            FROM 
                pedido
            LEFT JOIN 
                cliente 
            ON 
                pedido.cliente_id_cliente = cliente.id_cliente 
            LEFT JOIN 
                producto 
            ON 
                pedido.producto_id_producto = producto.id_producto
            WHERE 
                pedido.id_pedido = '$id';  -- Cambia esta fecha a la que necesites
        ";

                                    $resul = $conexion->prepare($consul);
                                    $resul->execute();
                                    $info = $resul->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                </p>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Entregar</th>

                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Entregar</th>

                                        </tr>
                                    </tfoot>

                                    <?php
                                    
                                    
                                    foreach ($info as $in) {
                                        echo "<tr class='text-center'>";
                                        echo "<td>" . $in['cantidad'] . "</td>";
                                        echo "<td><img width='70' src='" . $in['img'] . "'></td>";
                                        echo "<td>" . $in['nombre'] . "</td>";

                                        echo "<td>
        <div class='text-center'>
            <div class='btn-group'>
                <form method='get'>
                    <input type='hidden' name='id_producto' value='" . $in['producto_id_producto'] . "' />

                    <input type='hidden' name='cantidad' value='" . $in['cantidad'] . "' />
                    <button name='agrega' type='submit' class='btn btn-primary'><span class='text'>Elegir</span></button>
                    
                </div>
                    </form>";
                                        if (isset($_GET['agrega'])) {
                                            $cant = $_GET['cantidad'];
                                            $id_producto = $_GET['id_producto'];
                                            echo $id_producto;

                                            // Ejemplo de actualización UPDATE `saboresydelicias`.`inventario` SET `cantidad` = '1' WHERE (`id_inventario` = '1');
                                    
                                            $consulta = "UPDATE inventario SET cantidad = cantidad - '$cant' WHERE producto_id_producto = $id_producto;";
                                            $resultado = conexion::Actualizar($consulta);


                                            //UPDATE `saboresydelicias`.`pedido` SET `estado` = '2' WHERE (`id_pedido` = '50001');
                                            //UPDATE `saboresydelicias`.`pedido` SET `estado` = '1' WHERE (`id_pedido` = '50001');
                                            
                                            $cons = "UPDATE pedido SET estado = '2' WHERE `id_pedido` = '$id' ;";
                                            
                                            $result = conexion::Actualizar($cons);
                                            if ($resultado) {
                                                echo "rl pedido se ha entregado";
                                                $num = 0;
                                            } else {
                                                echo "Error en la actualización";
                                            }
                                        }
                                        echo "</div>
        </div>
        
    </td>";

                                        echo "</tr>";
                                    }


                                    ?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a class="btn btn-primary" href="consultar_pedidos.php">Confirmar</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>