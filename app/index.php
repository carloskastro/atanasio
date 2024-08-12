<?php
require_once 'conn.php';
session_start();

if (isset($_POST['validar'])) {
    $stmt=$conn->prepare('SELECT * FROM adm WHERE email=?');
    $stmt->bindParam(1,$_POST['email']);
    $stmt->execute();

    if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($_POST['pass'], $data['pass'])) {
            $_SESSION['adm']= $data['idadm'];
            header('location:homead.php'); 
        }else{
            echo "Contraseña incorrecta";
        }
    }else{
        echo "Usuario incorrecto";
    }
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Inicio de Sesión</h5>
            </div>
            <div class="card-body">
                <form class="form-floating" action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Escriba su correo">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="pass" name="pass"
                            placeholder="Escriba la contraseña">
                        <label for="pass">Contraseña</label>
                    </div>
                    <div class="form-floating mb-3 btn-group w-100">
                        <button class="btn btn-primary" type="submit" name="validar">Ingresar</button>
                        <button class="btn btn-danger" type="submit">Cancelar</button>
                    </div>
                    <a href="reg_adm.php">Registrar administrador</a>
                </form>
            </div>
        </div>

    </main>
    <footer class="">
      <p class="my-5 py-4 text-center" data-bs-toggle="tooltip" title="CACJX">Carlos Andres Castro - Copyright© 2024</p>
    </footer>

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>