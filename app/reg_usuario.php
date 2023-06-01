<!DOCTYPE html>
<html lang="es-CO">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fray Julio</title>
	<meta name="theme-color" content="#000000">
	<meta name="MobileOptimized" content="width">
	<!--Tags SEO-->
	<meta name="author" content="Fray Julio">
	<meta name="description" content="Aplicativo web para la enseñanza de Bootstrap de los del Fray Julio">
	<meta name="keywords" content="SENA, sena, Sena, Aplicativo, aplicativo, web, Web">

	<!-- Favicon-->
	<link href="../media/img/logo.png" rel="icon" type="image/x-icon">

	<!--Styles Bootstrap 5.3.0 alpha3-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<!--Library Icons Bootstrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
</head>
<body class="bg-dark">
	<?php
	require_once 'conn.php';
	$msg=null;

	if (isset($_POST['insertar'])) {
		//se hace la consulta
		$insert=$conn->prepare('INSERT INTO administrador(documento,nombre,apellido,direccion,telefono,fnac,user,pass) VALUES(?,?,?,?,?,?,?,?)');
		//se recbiben los datos del formulario
		$insert->bindParam(1,$_POST['documento']);
		$insert->bindParam(2,$_POST['nombre']);
		$insert->bindParam(3,$_POST['apellido']);
		$insert->bindParam(4,$_POST['direccion']);
		$insert->bindParam(5,$_POST['telefono']);
		$insert->bindParam(6,$_POST['fnac']);
		$insert->bindParam(7,$_POST['user']);
		$insert->bindParam(8,$_POST['pass']);

		if ($insert->execute()) {
			$msg="Datos registrados";
		}else{
			$msg="Datos no registrados";
		}

	}
	?>
	<main class="container pt-5 pb-5 form-signin w-100 m-auto">
		<div class="form-reg w-100 m-auto">
			<div class="card">
				<div class="card-header">
					<img class="mb-2" src="../media/img/logo.png" alt="Logo Sena" style="height: 48px">
					<span class="float-end">
						<!--<a href="./"><kbd class="bg-danger"><i class="bi bi-x-lg"></i></kbd></a>-->
						<a href="./" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
					</span>
					<div class="text-center">
						<h1 class="display-6 mb-0">Registro de Usuario</h1>
						<div class="subheading-1 mb-2">ASEM</div>
						<?php 
						if ($msg!='') {
							echo $msg;
						}
						?>
					</div>
				</div>
				<div class="card-body">
					<form action="" method="post" enctype="application/x-www-form-urlencoded">
						<div class="row">
							<div class="col">
								<div class="mb-3 mt-3">
									<label for="nombres" class="form-label">Nombres:</label>
									<input type="text" class="form-control" placeholder="Ingrese sus nombres" name="nombre" required>
								</div>
							</div>
							<div class="col">
								<div class="mb-3 mt-3">
									<label for="apellidos" class="form-label">Apellidos:</label>
									<input type="text" class="form-control"  placeholder="Ingrese sus apellidos" name="apellido" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="mb-3 mt-3">
									<label for="direccion" class="form-label">Dirección:</label>
									<input type="text" class="form-control" placeholder="Ingrese sus nombres" name="direccion" required>
								</div>
							</div>
							<div class="col">
								<div class="mb-3 mt-3">
									<label for="apellidos" class="form-label">Telefono:</label>
									<input type="text" class="form-control"  placeholder="Ingrese sus apellidos" name="telefono" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="mb-3 mt-3">
										<label for="cedula" class="form-label">Documento:</label>
										<input type="text" class="form-control"placeholder="Ingrese su número de documento" name="documento" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
										</div>
									</div>
									<div class="col">
										<div class="mb-3 mt-3">
											<label for="fnacimiento" class="form-label">Fecha Nac:</label>
											<input type="date" class="form-control"  placeholder="Ingrese sus apellidos" name="fnac" required>
										</div>
									</div>
								</div>

								<div class="mb-3 mt-3">
									<label for="usuario" class="form-label">Usuario:</label>
									<input type="text" class="form-control" placeholder="Ingrese su usuario" name="user" required>
								</div>
								<div class="mb-3">
									<label for="contraseña" class="form-label">Contraseña:</label>
									<input type="password" class="form-control" placeholder="Ingrese su contraseña" name="pass" required>
								</div>
								<div class="form-check mb-3">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="remember" required> Recuerdame
									</label>
								</div>
								<div class="btn-group w-100">
									<button type="submit" class="btn btn-success" name="insertar">Guardar</button>
									<a href="./" class="btn btn-primary">Ingresar</a>
								</div>				
							</form>
						</div>
						<div class="card-footer text-center">
							© 2023 Copyright Majosi
						</div>
					</div>
				</div>
			</main>

		</body>
		</html>