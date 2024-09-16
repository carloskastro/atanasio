<?php
require_once 'conn.php';

if (isset($_POST['btn-reg'])) {
    $sql = $conn->prepare("INSERT INTO adm(fname,lname,email,pass) VALUES(?,?,?,?)");
    $sql->bindParam(1, $_POST['fname']);
    $sql->bindParam(2, $_POST['lname']);
    $sql->bindParam(3, $_POST['email']);
    $pass=password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $sql->bindParam(4, $pass);

    if ($sql->execute()) {
        $msg=array("Datos Registrados","success");
        } else {
        $msg=array("Datos no registrados","warning");
        }
    }
?>
<!DOCTYPE html>
<html lang="es-CO" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atanasio_Reg_admin</title>

    <!--Styles Bootstrap 5.3.3-->
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body style="background-color: lightblue;">
    <main class="form-register w-100 m-auto">
        <!--Ventana de alerta-->
        <?php if (isset($msg)) { ?>
            <div class="alert alert-<?php echo $msg['1']; ?> alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Alerta!</strong> <?php echo $msg['0']; ?>
            </div>
            <?php } ?>
      <!--Ventana de alerta-->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Registro del Admin</h5>
            </div>
            <div class="card-body">
                <form class="form-floating" action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="fname" name="fname"
                            placeholder="Escriba sus nombres">
                        <label for="fname">Nombres</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lname" placeholder="Escriba sus nombres"
                            name="lname">
                        <label for="lname">Apellidos</label>
                    </div>
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
                        <button class="btn btn-primary" type="submit" name="btn-reg">Registrar</button>
                        <button class="btn btn-danger" type="submit">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <footer>
        footer
    </footer>

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>
