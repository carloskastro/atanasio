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
	<link href="../media/img/logo1.png" rel="icon" type="image/x-icon">

	<!--Styles Bootstrap 5.3.0 alpha3-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
</head>
<body>
	<main>
		<div class="container mt-3">
			<h2 class="text-center">Formulario de inicio</h2>
			<form action="/action_page.php">
				<div class="mb-3 mt-3">
					<label for="email">Usuario:</label>
					<input type="email" class="form-control" id="email" placeholder="Digite su usuario" name="email">
				</div>
				<div class="mb-3">
					<label for="pwd">Contraseña:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Digite su contraseña" name="pswd">
				</div>
				<div class="form-check mb-3">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="remember"> Remember me
					</label>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</main>
	
</body>
</html>