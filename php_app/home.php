<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/homestyles.css">
    <link rel="icon" type="image/x-icon" href="img/iconb.png">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <title>Accountly - Login</title>
</head>

<body>
    <?php

    include('logic/conexion.php');
    include('logic/ccuenta.php');
    ?>
    <header class="general-header">
        <div class="logo-container">
            <img src="img/iconb.png" alt="">
            <span>Accountly</span>
        </div>
        <nav>
            <ul>
            </ul>
        </nav>
    </header>
    <div class="mdl-container" id="mdlcontainer">
        <div class="mdl-box">
            <header>
                <span class="material-symbols-outlined mdl-icon-header">add</span>
                <span class="mdl-text-header">Nuevo Registro</span>
                <a href="home.php" class="mdl-cls">
                    <span class="material-symbols-outlined">close</span>
                </a>
            </header>
            <form class="row" action="home.php" method="post">
                <div class="form-group col-md-12">
                    <label for="tipo">Tipo de Cuenta</label>
                    <select class="form-select" name="tipo" id="tipo">
                        <?php 
                        if ($dtCat) {
                            foreach($dtCat as $dc){
                        ?>
                            <option value="<?=$dc['idtip'];?>"><?=$dc['nomtip'];?></option>
                        <?php        
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class=" col-md-12">
                    <label for="nomcue">Nombre de Cuenta</label>
                    <input class="form-control" type="text" name="nomcue" id="nomcue">
                </div>
                <div class="col-md-12">
                    <label for="acceso">Acceso</label>
                    <input class="form-control" type="text" name="acceso" id="acceso">
                </div>
                <div class="col-md-12">
                    <label for="clave">Contraseña</label>
                    <input class="form-control" type="text" name="clave" id="clave">
                </div>
                <div class="col-md-12">
                    <input type="hidden" name="idusu" id="idusu" value="<?= $_SESSION['idusu'] ?>">
                    <input type="hidden" name="ope" id="ope" value="save">
                    <input class="mdl-btn-submit" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
    <main>
        <h2 class="welcome-header">Hola <b><?= $_SESSION['nombre'] ?></b>, Esperamos que estes excelente el dia de hoy!</h2>
        <div class="welcome-container">
            <span class="material-symbols-outlined wlc-icon">person</span>
            <span class="wlc-text">Usuarios y Contraseñas</span>
            <button class="add-btn" id="open-mdl">
                <span class="material-symbols-outlined">add</span>
                <span>Agregar</span>
            </button>
        </div>
        <div class="container-fluid">
            <table class="table table-striped" border="1" id="userpass">
                <thead>
                    <tr class="tr-style" id="aguacoco">
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Cuenta</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($dtAll) {
                        foreach ($dtAll as $dt) {

                    ?>
                            <tr>
                                <td><?= $dt['idcue']; ?></td>
                                <td><?= $dt['nomtip']; ?></td>
                                <td><?= $dt['nomcue']; ?></td>
                                <td><?= $dt['acceso']; ?></td>
                                <td><?= $dt['clave']; ?></td>
                                <td></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr class="tr-style" id="aguacoco">
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Cuenta</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    <script src="js/code.js"></script>
    <script>
        $(document).ready(function() {
            $('#userpass').DataTable({
                "paging": true, // Habilita paginación
                "searching": true, // Habilita el buscador
                "ordering": false, // Habilita ordenación de columnas
                "pageLength": 10, // Muestra 5 filas por página
                "lengthMenu": [5, 10, 20, 50] // Opciones para cambiar el número de filas
            }); // Inicializa DataTables
        });
    </script>
</body>
</html>