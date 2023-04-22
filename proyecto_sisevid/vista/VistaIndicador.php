<?php																					//Etiqueta para escribir código de php
include '../control/configBd.php';
include '../control/ControlIndicador.php';
include '../control/ControlConexionE.php';
include '../modelo/Indicador.php';

$objControlIndicador = new ControlIndicador(null);											//Creación del objeto, instanciando la clase   // (null) es el argumento
$arregloIndicador=$objControlIndicador->listar();												//Para poder llamar al método, que retorno un arreglo de Estados
//var_dump($arregloEstados);															//Es como el echo y muestra todos los datos, pero con el echo mostraría un error de variables
$id = "";	
$codigo = "";																			//Se inicializan las variables	
$nombre  = "";
$objetivo  = "";
$alcance  = "";
$formula  = "";
$fkidtipoindicador  = "";
$fkidunidadmedicion  = "";
$meta  = "";
$fkidsentido  = "";
$fkidfrecuencia  = "";
$boton = "";

if(isset($_POST['txtId']))$id=$_POST['txtId'];		
if(isset($_POST['txtCodigo']))$codigo=$_POST['txtCodigo'];										//Llevando variables locales de los datos que fueron pasados por el método post
if(isset($_POST['txtNombre']))$nombre=$_POST['txtNombre'];
if(isset($_POST['txtObjetivo']))$objetivo=$_POST['txtObjetivo'];
if(isset($_POST['txtAlcance']))$alcance=$_POST['txtAlcance'];
if(isset($_POST['txtFormula']))$formula=$_POST['txtFormula'];
if(isset($_POST['txtIdTipoIndicador']))$fkidtipoindicador=$_POST['txtIdTipoIndicador'];
if(isset($_POST['txtIdUnidadMedicion']))$fkidunidadmedicion=$_POST['txtIdUnidadMedicion'];
if(isset($_POST['txtMeta']))$meta=$_POST['txtMeta'];
if(isset($_POST['txtIdSentido']))$fkidsentido=$_POST['txtIdSentido'];
if(isset($_POST['txtIdFrecuencia']))$fkidfrecuencia=$_POST['txtIdFrecuencia'];
if(isset($_POST['btn']))$boton=$_POST['btn'];											//Para verificar que si se está ejecutando

switch ($boton) {
	case 'Guardar':
		$objIndicador = new Indicador($id,$codigo,$nombre, $objetivo, $alcance, $formula, $fkidtipoindicador, $fkidunidadmedicion, $meta, $fkidsentido, $fkidfrecuencia);
		$objControlIndicador = new ControlIndicador($objIndicador);			//Para llamar al guardar
		$objControlIndicador -> guardar();								//Llamamos al método guardar
		header('Location: vistaIndicador.php');	   	 					//Este es para refrescar la página y que lo muestre
		break;
	case 'Consultar':
		$objIndicador = new Indicador($id,"", "", "", "", "", "", "", "", "", "");								//Objeto tiene adentro solo el nombre del Estado 
		$objControlIndicador =new ControlIndicador($objIndicador);			    //Para llamar al guardar
		$objIndicador=$objControlIndicador->consultar();					//Llamamos al método guardar
		$nomb=$objIndicador->getNombre();
		break;
    case 'Modificar':
		$objIndicador = new Indicador($id,$codigo,$nombre, $objetivo, $alcance, $formula, $fkidtipoindicador, $fkidunidadmedicion, $meta, $fkidsentido, $fkidfrecuencia);
		$objControlIndicador = new ControlIndicador($objIndicador);			//Para llamar al guardar
		$objControlIndicador -> modificar();								//Llamamos al método guardar
		header('Location: vistaIndicador.php');	   							//Este es para refrescar la página y que lo muestre
		break;
	case 'Borrar':
		$objIndicador = new Indicador($id,"", "", "", "", "", "", "", "", "", "");
		$objControlIndicador = new ControlIndicador($objIndicador);			//Para llamar al guardar
		$objControlIndicador -> borrar();									//Llamamos al método guardar
		header('Location: vistaIndicador.php');	   								//Este es para refrescar la página y que lo muestre
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
	<title>Gestión de Estados</title>
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
		box-shadow: 0 1px 1px rgba(0,0,0,.05);
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
	table.table tr th, table.table tr td {
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
	.pagination li.active a, .pagination li.active a.page-link {
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
	.custom-checkbox label:before{
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
	.custom-checkbox input[type="checkbox"]:checked + label:after {
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
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 800px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
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
		$(document).ready(function(){
		// Activate tooltip
		$('[data-toggle="tooltip"]').tooltip();
		
		// Select/Deselect checkboxes
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;                        
				});
			} else{
				checkbox.each(function(){
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function(){
			if(!this.checked){
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
						<h2>Gestión <b>Indicador</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Gestion de Indicadores</span></a>		
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
						<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($arregloIndicador);$i++){?>				
					<tr>
						<td>		<!-- Columna 1 -->
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td><?php echo $arregloIndicador[$i]->getId(); ?></td>	<!--El dato en n posición--> <!-- Columna 2 -->
						<td><?php echo $arregloIndicador[$i]->getNombre(); ?></td>	<!--El dato en n posición--> <!-- Columna 3 -->
						
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>					<!-- Columna 4 -->
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->			<!-- Este es el modal para los cuatro botones -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form1" action="vistaIndicador.php" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Indicadores</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">			
						<ul  class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos indicador</a>
							</li>
							</ul>
							<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="form-group">
									<label>Id del Indicador</label>
									<input type="text" class="form-control"  name="txtId" value="<?php echo $id ?>">			<!--Con esto muestra el nombre de Estado-->
								</div>
								<div class="form-group">
									<label>Código</label>
									<input type="text" class="form-control" name="txtCodigo" value="<?php echo $codigo ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control" name="txtNombre" value="<?php echo $nombre ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Objetivo</label>
									<input type="text" class="form-control" name="txtObjetivo" value="<?php echo $objetivo ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Alcance</label>
									<input type="text" class="form-control" name="txtAlcance" value="<?php echo $alcance ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Formula</label>
									<input type="text" class="form-control" name="txtFormula" value="<?php echo $formula ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Id tipo indicador</label>
									<input type="text" class="form-control" name="txtIdTipoIndicador" value="<?php echo $fkidtipoindicador ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Id unidad medición</label>
									<input type="text" class="form-control" name="txtIdUnidadMedicion" value="<?php echo $fkidunidadmedicion ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Meta</label>
									<input type="text" class="form-control" name="txtMeta" value="<?php echo $meta ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Id sentido</label>
									<input type="text" class="form-control" name="txtIdSentido" value="<?php echo $fkidsentido ?>">				<!--Con esto muestra la contraseña-->
								</div>

                                <div class="form-group">
									<label>Id frecuencia</label>
									<input type="text" class="form-control" name="txtIdFrecuencia" value="<?php echo $fkidfrecuencia ?>">				<!--Con esto muestra la contraseña-->
								</div>
                                
								<div class="modal-footer">
									<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-success" value="Guardar" name="btn"> 
									<input type="submit" class="btn btn-success" value="Consultar" name="btn">
									<input type="submit" class="btn btn-success" value="Modificar" name="btn">
									<input type="submit" class="btn btn-success" value="Borrar" name="btn">
								</div>	
							</div>
								</div>
							</div>
						</div>
				</div>								
			</form>
		</div>
	</div>
</div>

</body>
</html>