<?php
if (isset($_GET['del'])) {
    $stmt = $conn->prepare('DELETE FROM adm WHERE idadm=?');
    $stmt->bindParam(1, $_GET['del']);
    $stmt->execute();
    if ($stmt) {
        $msg = array("Datos eliminados", "success");
        } else {
        $msg = array("Datos no eliminados", "danger");
        }
    }
?>
<!--Styles Datatables-->
<link rel="stylesheet" href="../assets/datatables/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../assets/datatables/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="../assets/datatables/css/responsive.dataTables.min.css">


<h1 class="pt-5 mt-5">Tabla</h1>
   <!--Alerta eliminar-->
   <?php if (isset($msg)) { ?>
        <div class="alert alert-<?php echo $msg['1']; ?> alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Alerta!</strong> <?php echo $msg['0']; ?>
        </div>
    <?php } ?>
    <!--Alerta eliminar-->

<table class="table table-striped table-hover table-bordered" id="tableres">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->prepare('SELECT * FROM adm');
        $result->execute();
        while ($view = $result->fetch(PDO::FETCH_ASSOC)) {

            ?>
            <tr>
                <td><?php echo $view['idadm']; ?></td>
                <td><?php echo $view['fname']; ?></td>
                <td><?php echo $view['lname']; ?></td>
                <td><?php echo $view['email']; ?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#eliminar=<?php echo $view['idadm']; ?>">Eliminar</button>
                </td>
            </tr>
            <!--Operaciones-->
            <div class="modal fade" id="eliminar=<?php echo $view['idadm']; ?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Mensaje de Alerta</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Realmente desea eliminar el registro con los datos:
                                <?php echo $view['email'] . " " . $view['fname']; ?> ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="homead.php?page=tabla&del=<?php echo $view['idadm']; ?>"
                                class="btn btn-success">Confirmar</a>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Operaciones-->
        <?php } ?>
    </tbody>
</table>

<!--Datatables Scripts-->
<script type="text/javascript" src="../assets/datatables/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../assets/datatables/js/jquery.dataTables.min.js"></script>

<!--Datatables responsive script-->
<script type="text/javascript" src="../assets/datatables/js/dataTables.responsive.min.js"></script>

<!--Datatables Buttons Prints Script-->
<script type="text/javascript" src="../assets/datatables/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../assets/datatables/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="../assets/datatables/js/jszip.min.js"></script>
<script type="text/javascript" src="../assets/datatables/js/pdfmake.min.js"></script>
<script type="text/javascript" src="../assets/datatables/js/vfs_fonts.min.js"></script>
<script type="text/javascript" src="../assets/datatables/js/buttons.html5.js"></script>
<script type="text/javascript" src="../assets/datatables/js/buttons.print.js"></script>

<script type="text/javascript">
    //Table
    $(document).ready(function () {
        $('#tableres').DataTable({
            dom: 'Bflrtip',
            buttons: [
                {//Botón Copy
                    extend: 'copyHtml5',
                    footer: true,
                    titleAttr: 'Copiar',
                    className: 'btn btn-outline-primary btn-md',
                    text: '<i class="bi bi-clipboard"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {//Botón Excel
                    extend: 'excelHtml5',
                    footer: true,
                    titleAttr: 'Excel',
                    className: 'btn btn-outline-success btn-md',
                    text: '<i class="bi bi-file-excel"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {//Botón Pdf
                    extend: 'pdfHtml5',
                    footer: true,
                    titleAttr: 'PDF',
                    className: 'btn btn-outline-danger btn-md',
                    text: '<i class="bi bi-filetype-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {//Botón print
                    extend: 'print',
                    footer: true,
                    titleAttr: 'Imprimir',
                    className: 'btn btn-outline-info btn-md',
                    text: '<i class="bi bi-printer"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    }
                },
            ],
            responsive: true,
            language: {
                url: '../assets/datatables/es-ES.json'
            },
        });
    });
</script>
<!--Datatables-->