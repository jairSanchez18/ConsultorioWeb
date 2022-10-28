<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pacientes</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit-icons.min.js"></script>


    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/estilos.css">

    <style>
        a {
            text-decoration: none;
        }

        header .nav-item a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <?php
        require_once('template/header.php');
        ?>
    </header>
    <div class="container mb-5">
        <div class="mt-5">
            <h3 class="h3 text-primary"><i class="bi bi-journal-medical px-2"></i>Información general de los pacientes</h3>
        </div>
        <hr class="mb-5">
        <div class="bg-primary text-white p-2 fw-bold">
            <i class="bi bi-person-fill px-2"></i>Lista de Pacientes
        </div>
        <table class="table table-pacientes">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Información</th>
                    <th class="text-center">Ver Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php $pac = 0; foreach ($Listapaciente as $p) { ?>
                    <tr>
                        <th><?php echo $pac=$pac+1 ?></th>
                        <td><?php echo $p->nombre ?></td>
                        <td><?php echo $p->apellido ?></td>
                        <td>Nacimiento: <?php echo $p->nacimiento ?> <br>
                            Edad: <?php echo $p->edad ?> Años <br>
                            Email: <?php echo $p->email ?></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-warning dropdown-toggle font-opciones" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Opciones Generales
                                </button>
                                <ul class="dropdown-menu font-opciones">
                                    <li><a class="dropdown-item" style="text-decoration: none;" href="./?op=expedientepac&pac=<?php echo $p->id ?>">Ver el expediente clinico</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <footer uk-sticky="position: bottom">
        <?php
        require_once('template/footer.php');
        ?>
    </footer>
</body>

</html>