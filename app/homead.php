<?php
require_once 'conn.php';
session_start();

if (isset($_SESSION['adm'])) {
    $search=$conn->prepare('SELECT * FROM adm WHERE idadm=?');
    $search->bindParam(1,$_SESSION['adm']);
    $search->execute();
    if ($data=$search->fetch(PDO::FETCH_ASSOC)) {
}

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
    <main class="form-register w-100 m-auto p-auto">
        <?php
        echo "Hola ".$data['fname'];
        ?>
        <a href="logout.php">Salir</a>
       

    </main>
    <footer class="">
      <p class="my-5 py-4 text-center" data-bs-toggle="tooltip" title="CACJX">Carlos Andres Castro - Copyright© 2024</p>
    </footer>

    <script src="../assets/js/bootstrap.bundle.js"></script>
    <?php
    }else {
        header('location:./');
    }
    ?>
</body>

</html>