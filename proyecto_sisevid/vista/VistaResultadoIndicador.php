<?php
include '../control/configBd.php';
include '../control/ControlResultadoIndicador.php';
include '../control/ControlConexion.php';
include '../modelo/ResultadoIndicador.php';
$objControlResultadoIndicador=new ControlResultadoIndicador(null);
$arregloResultadoIndicador=$objControlResultadoIndicador->listar();
//var_dump($arregloResultadoIndicador);
$id="";
$resultado="";
$fechaCalculo="";
$fkidindicador="";
$boton="";
if(isset($_POST['txtId']))$id=$_POST['txtId'];
if(isset($_POST['txtResultado']))$resultado=$_POST['txtResultado'];
if(isset($_POST['txtFechaCalculo']))$fechaCalculo=$_POST['txtFechaCalculo'];
if(isset($_POST['txtfkidindicador']))$fkidindicador=$_POST['txtfkidindicador'];


if(isset($_POST['btn']))$boton=$_POST['btn'];

switch ($boton) {
	case 'Guardar':
		$objResultadoIndicador= new ResultadoIndicador($id,$resultado,$fechaCalculo,$fkidindicador);
		$objControlResultadoIndicador=new ControlResultadoIndicador($objResultadoIndicador);
		$objControlResultadoIndicador->guardar();
		header('Location: VistaResultadoIndicador.php');
		break;
	case 'Consultar':
		$objResultadoIndicador= new ResultadoIndicador($id,$resultado,$fechaCalculo,$fkidindicador);
		$objControlResultadoIndicador=new ControlResultadoIndicador($objResultadoIndicador);
		$objResultadoIndicador=$objControlResultadoIndicador->consultar();
		$resultado=$objResultadoIndicador->getResultado();
        $fechaCalculo=$objResultadoIndicador->getFechaCalculo();
        $fkidindicador=$objResultadoIndicador->getfkidindicador();

        break;
	case 'Modificar':
		$objResultadoIndicador= new ResultadoIndicador($id,$resultado,$fechaCalculo,$fkidindicador);
		$objControlResultadoIndicador=new ControlResultadoIndicador($objResultadoIndicador);
		$objControlResultadoIndicador->modificar();
		header('Location: VistaResultadoIndicador.php');
		break;	
	case 'Borrar':
		$objResultadoIndicador= new ResultadoIndicador($id,"","","");
		$objControlResultadoIndicador=new ControlResultadoIndicador($objResultadoIndicador);
		$objControlResultadoIndicador->borrar();
		header('Location: VistaResultadoIndicador.php');
		break;		
	default:
		# code...
		break;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Resultado Indicador</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 800px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Resultado Indicador</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Resultado indicador</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Id</th>
                            <th>Resultado</th>
                            <th>Fecha Calculo</th>
                            <th>Id indicador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- //aqui llena el cuadro -->
                        <?php for ($i = 0; $i < count($arregloResultadoIndicador); $i++) { ?>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td><?php echo $arregloResultadoIndicador[$i]->getId(); ?></td>
                                <td><?php echo $arregloResultadoIndicador[$i]->getResultado(); ?></td>
                                <td><?php echo $arregloResultadoIndicador[$i]->getFechaCalculo(); ?></td>

                                <td><?php echo $arregloResultadoIndicador[$i]->getfkidindicador(); ?></td>
                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
              
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
				<!-- //Alert tener cuidado porque me redirecciona a la pag que coloque aquí -->
                <form id="form1" action="VistaResultadoIndicador.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Responsable indicador</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Responsable Indicador</a>

                                </div>
                            </nav>
                            <!-- combossssssssssssssssssssssssss -->
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="form-group">
                                        <label>Id:</label>
                                        <input type="text" class="form-control"  name="txtId" value="<?php echo $id ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Resultado:</label>
                                        <input type="text" class="form-control" name="txtResultado" value="<?php echo $resultado ?>">
                                    </div>


                                    <div class="form-group">
                                        <label>FechaCalculo:</label>
                                        <input type="datetime-local" class="form-control" name="txtFechaCalculo" value="<?php echo $fechaCalculo ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Id indicador:</label>
                                        <input type="text" class="form-control" name="txtfkidindicador" value="<?php echo $fkidindicador ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Guardar" name="btn">
                                        <input type="submit" class="btn btn-success" value="Consultar" name="btn">
                                        <input type="submit" class="btn btn-success" value="Modificar" name="btn">
                                        <input type="submit" class="btn btn-success" value="Borrar" name="btn">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>