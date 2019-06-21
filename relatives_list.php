<?php
session_start();
if( !isset($_SESSION['id_session'])){
    header("location: index.php");
}
include_once("includes/functions.php");
$file = fopen('familiares.csv', 'r+');
if(!$file){
    return "Error en el archivo";
    exit();
}
$i = 0;
while (!feof($file)) {
    $i++;
    $line = fgets($file);
    $field[$i] = explode (',', trim($line));
    $file++;
}
$registros = count($field)-1;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Familia | Expediente Medico Familiar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- DataTables -->
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Navigation Bar-->
        <?php include_once("includes/nav.php"); ?>
        <!-- End Navigation Bar-->
        <div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Lista de familiares</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <!--h4 class="header-title">Buttons example</h4>
                            <p class="text-muted m-b-30">
                                The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                            </p-->
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Edad</th>
                                        <th class="text-center">Prentesco</th>
                                        <th class="text-center">Documentos</th>
                                        <th class="text-center">doctores</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($field as $val){ ?>
                                    <tr>
                                    <?php //ESTRUCTURA DE CONTROL FOR
                                    for($k=0; $k<=$registros; $k++){
                                        if($k == 1){ 
                                            $val[$k] = calculaedad($val[$k]);
                                            $s = plural($val[$k]);
                                        }else{
                                            $s = "";
                                        } 
                                        ?>
                                        <td><?= $val[$k]." ".$s; ?></td>
                                    <?php } ?>
                                        <td class="text-center"><a href="documents_list.php"><i class="fa fa-file-pdf-o"></i></a></td>
                                        <td class="text-center"><a href="doctors_list.php"><i class="fa fa-user-md"></i></a></td>
                                        <td class="text-center"><a href="family_form.php"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center"><a href="delete_relative.php"><i class="fa  fa-trash"></i></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
        <!-- Footer -->
        <?php include_once("includes/footer.php"); ?>
        <!-- End Footer -->
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- Required datatable js -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons -->
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <!-- Responsive-->
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });
                table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
                $('#datatable-buttons_filter').append('<div class="button-list"><a href="family_form.php" class="btn btn-success waves-light waves-effect">Agregar</a></div>');
            } );
        </script>
    </body>
</html>