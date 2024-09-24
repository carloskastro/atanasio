<?php
require_once 'conn.php';
session_start();

if (isset($_SESSION['adm'])) {
    $search=$conn->prepare('SELECT * FROM adm WHERE idadm=?');
    $search->bindParam(1,$_SESSION['adm']);
    $search->execute();
  
    if ($data=$search->fetch(PDO::FETCH_ASSOC)) {
?>
<!DOCTYPE html>
<html lang="es-CO" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atanasio</title>
    <!--Favicon and title-->
    <link rel="icon" type="image/x-icon" href="../assets/img/logosena.png" />
    <link rel="apple-touch-icon" type="image/png" href="../assets/img/iconsena.png" />

    <!--Styles Bootstrap 5.3.3-->
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img
                src="../assets/img/logosena.png"
                alt="Avatar Logo"
                style="width: 40px"
                class=""
                />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar"
                aria-label="Boton de menú"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homead.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=tabla">Tabla</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Integrantes</a>
                </li>
                </ul>
                <div class="d-flex"> 
                <button class="btn btn-primary" type="button" onclick="location.href='logout.php'"><?php echo "Hola ".$data['fname']; ?></button>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <main class="container m-auto p-auto">
    
       <?php
       $page=isset($_GET['page']) ? strtolower($_GET['page']) : 'homead';
       require_once './'.$page.'.php';

       if ($page=='homead.php') {
        require_once 'init.php'; //mensaje de bienvenida
       }
       ?>

    </main>
    <footer class="">
      <p class="my-5 py-4 text-center" data-bs-toggle="tooltip" title="CACJX">Carlos Andres Castro - Copyright© 2024</p>
    </footer>

    <script src="../assets/js/bootstrap.bundle.js"></script>
    <?php
    }
    }else {
        header('location:./');
    }
    ?>
</body>

</html>