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
<body class="">
	<?php
	require_once 'conn.php';
	session_start();

	if (isset($_POST['validar'])) {
		$result= $conn->prepare('SELECT * FROM administrador WHERE user=?');
		$result->bindParam(1,$_POST['user']);
		$result->execute();

		//Pasamos los datos ordenados al arreglo $data
		if($data=$result->fetch(PDO::FETCH_ASSOC)){
			
			if (password_verify($_POST['pass'], $data['pass'])) {
				$_SESSION['adm'] = $data['idadministrador'];
				header('location: homeadm');
			} else {
				echo "Contraseña incorrecta";
			}
			

		}else{
			echo "Datos incorrectos";
		}
	}

	?>
	<main>
		<div class="container mt-3">
			<div class="card">
				<div class="card-header">
					<div class="row">
					<div class="col text-left">
						<img class="mb-2" src="../media/img/logo.png" alt="Logo Sena" style="height: 48px">
					</div>
					<div class="col text-end">
						<a href="../"><i class="text-danger bi bi-x-circle-fill"></i></a>
					</div>
				</div>
					
				</div>
				<div class="card-body">
					<p class="display-6 text-center">Inicio de Sesión</p>
					<form action="" method="post" enctype="application/x-www-form-urlencoded">
						<div class="mb-3 mt-3">
							<label for="user">Usuario:</label>
							<input type="text" class="form-control"  placeholder="Digite su usuario" name="user" required>
						</div>
						<div class="mb-3">
							<label for="pwd">Contraseña:</label>
							<input type="password" class="form-control" placeholder="Digite su contraseña" name="pass" required>
						</div>
						<div class="form-check mb-3">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="remember" required> Recuerdáme
							</label>
						</div>
						<button type="submit" class="btn btn-primary" name="validar">Entrar</button>
						<a href="reg_usuario" class="btn btn-link">Registrar</a>
					</form>
				</div>
			</div>
		</div>
	</main>
	
</body>
</html>