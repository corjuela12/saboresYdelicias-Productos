<?php
include_once  "BD/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_producto, nombre, marca, precio_compra, img, precio_venta,categoria, descripcion FROM producto";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shorcut icon" href="#">
        <title>Consultar/Agregar productos</title>

        <link rel="stylesheet" href="css/sb-admin-2.min.css">
        <link rel="stylesheet" href="main.css">

        <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
        <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
        <title>Crud</title>
        
    </head>
    <body>
        <header>
            <h3 class="text-center ">Consultar productos</h3>  
        </header>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button id="btnnuevo type="button" class="btn btn-success">nuevo</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id= "tablapersonas" class="table table-striped table-bordered table-condensed" 
                        style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Id producto</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Precio compra</th>
                                    <th>Imagen</th>
                                    <th>Precio venta</th>
                                    <th>Categoria</th>
                                    <th>Descripción</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($data as $dat) {
                                ?>
                                <thead class="text-center">
                                <tr>
                                    <td><?php echo $dat['id_producto'] ?></td>
                                    <td><?php echo $dat['nombre'] ?></td>
                                    <td><?php echo $dat['marca'] ?></td>
                                    <td><?php echo $dat['precio_compra'] ?></td>
                                    <td><?php echo $dat['img'] ?></td>
                                    <td><?php echo $dat['precio_venta'] ?></td>
                                    <td><?php echo $dat['categoria'] ?></td>
                                    <td><?php echo $dat['descripcion'] ?></td>
                                
                                </tr>
                                </thead>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal para crud-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;
                </span>
                </button>
            </div>
        <form id="formPersonas">
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="pais" class="col-form-label">Pais:</label>
                <input type="text" class="form-control" id="pais">
                </div>
                <div class="form-group">
                <label for="edad" class="col-form-label">Edad:</label>
                <input type="number" class="form-control" id="edad">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">cancelar</button>
                <button type="submit" id=btnGuardar class="btn btn-dark">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- jquery, popper.js, Bootstrap JS-->
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- datatables JS-->
<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script type="text/javascript" src="main.js"></script>


    </body>
</html>