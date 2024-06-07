<?php
include_once "BD/actualizar.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT producto.id_producto, producto.nombre, producto.img, inventario.cantidad  
                FROM producto 
                LEFT JOIN inventario 
                ON producto.id_producto = inventario.producto_id_producto";
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

    <title>Consultar Inventario</title>

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
                        <a class="collapse-item" href="consultar_inventario.html">Consultar Inventario</a>
                        <a class="collapse-item" href="agregar_proveedor.php">Agregar Inventario</a>

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
                    <h2 class="m-0 font-weight-bold text-primary text-center">Consultar Inventario</h1>


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
                                                <th>Id producto</th>
                                                <th>Nombre</th>
                                                <th>Imagen</th>
                                                <th>Cantidad</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="text-center">
                                            <tr>
                                                <th>Id producto</th>
                                                <th>Nombre</th>
                                                <th>Imagen</th>
                                                <th>Cantidad</th>
                                                <th>Agregar inventario</th>
                                            </tr>
                                        </tfoot>

                                        <?php
                                        foreach ($data as $dat) {
                                            echo "<tr class='text-center'>";
                                            echo "<td>" . $dat['id_producto'] . "</td>";
                                            echo "<td>" . $dat['nombre'] . "</td>";
                                            echo "<td><img width='70' src='" . $dat['img'] . "'></td>";
                                            echo "<td>" . $dat['cantidad'] . "</td>";
                                            echo "<td>
            <div class='text-center'>
                <div class='btn-group'>
                    <form method='get'>
                        <input name='num' type='number' min='0' style='width: 50px; margin-right: 5px;' placeholder='10' required />
                        <input type='hidden' name='id_producto' value='" . $dat['id_producto'] . "' />
                        <button name='agregar' type='submit' class='btn btn-primary'><span class='text'>Agregar</span></button>
                    </form>
                </div>
            </div>
          </td>";
                                            echo "</tr>";
                                        }

                                        if (isset($_GET['agregar'])) {
                                            $id = $_GET['id_producto'];
                                            $num = $_GET['num'];

                                            // Ejemplo de actualización UPDATE `saboresydelicias`.`inventario` SET `cantidad` = '1' WHERE (`id_inventario` = '1');
                                        
                                            $consulta = "UPDATE inventario SET cantidad = cantidad + '$num' WHERE producto_id_producto = '$id'";
                                            $resultado = conexion::Actualizar($consulta);

                                            if ($resultado) {
                                                echo "Actualización exitosa";
                                                $num = 0;
                                            } else {
                                                echo "Error en la actualización";
                                            }
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

            </tbody>
            </table>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const showModalBtns = document.querySelectorAll('.showModalBtn');

                showModalBtns.forEach(btn => {
                    btn.addEventListener('click', function () {
                        const idProducto = this.getAttribute('data-id');

                        // Aquí realizas la solicitud AJAX al archivo PHP que manejará la petición
                        // Puedes usar la función fetch() o XMLHttpRequest para enviar la solicitud
                    });
                });
            });

        </script>
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
    <div id="subventana">
        <!-- Aquí se cargará el contenido de la subventana -->
    </div>
</body>

</html>