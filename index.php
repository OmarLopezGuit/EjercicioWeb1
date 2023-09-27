<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Artículos</title>
		<script src="views/articulos/js/jquery.js"></script>
		<script src="views/articulos/js/articulos.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
	</head>
	
	<body>
		<div class="container">
			<h2>Artículos</h2>
			<div id="lbl_alert"></div>
			<button id="btn_agregar" class="btn btn-success">Agregar</button>
			<br/><br/>
			<div class="table-responsive">
				<table id="tbl_registros" border="1" width="100%" class="table">
					<thead>
						<tr class="table-primary">
							<th>Nombre</th>
							<th>Notas</th>
							<th>Precio</th>
							<th>Iva</th>
							<th>Total</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>					
				</table>
			</div>
		</div>
		<?php require_once "views/articulos/articulos_edicion.php"; ?>
	</body>
</html>