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
<body>
	<?php
	require_once 'conn.php';
	session_start();

	if (isset($_SESSION['adm'])) {
		$search=$conn->prepare('SELECT * FROM administrador WHERE idadministrador=?');
		$search->bindParam(1,$_SESSION['adm']);
		$search->execute();
		$data=$search->fetch(PDO::FETCH_ASSOC);
	}
	if (is_array($data)) {

		?>

		<header>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Logo</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav me-auto">
							<li class="nav-item">
								<a class="nav-link" href="#">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?pag=tabla">Tabla</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Link</a>
							</li>
						</ul>
						<div class="d-flex">
							<a href="logout.php" class="btn btn-primary">Salir</a>			
						</div>
					</div>
				</div>
			</nav>
		</header>
		<main>
			<?php
			$pag=isset($_GET['pag']) ? strtolower($_GET['pag']) : 'homeadm';
			require_once './'.$pag.'.php';
			?>
		</main>
		<footer>
			Contenido de marca
		</footer>
		<?php
	}else{
		header('location: ./');
	}
	?>
</body>
</html>