<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de pacientes</title>

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
            <h3 class="h3 text-primary"><i class="bi bi-journal-medical px-2"></i>Resultados encontrados</h3>
        </div>
        <hr class="mb-5">
        <div class="bg-primary text-white p-2 fw-bold">
            <i class="bi bi-person-fill px-2"></i>Pacientes
        </div>
        <div class="border p-2">
            <table class="table font-opciones">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Cedula</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Ver Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Busqueda as $lc) { ?>
                        <tr>
                            <td><?php echo $lc->nombre . " " . $lc->apellido; ?></td>
                            <td><?php echo $lc->cedula; ?></td>
                            <td class="<?php if($lc->activo == 1){echo "bg-success";}else{echo "bg-danger";} ?>"></td>
                            <td class="text-center"><?php if($lc->activo == 1){ ?><a href="./?op=expedientepac&pac=<?php echo $lc->id ?>" class="btn btn-warning"><i class="bi bi-eye-fill"></i></a><?php }else{ echo "Debe habilitar el expediente";} ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer uk-sticky="position: bottom">
        <?php
        require_once('template/footer.php');
        ?>
    </footer>
</body>

</html>