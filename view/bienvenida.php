<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Bienvenido</title>

    <style>
        .col {
            height: 300px;
        }
    </style>
</head>

<body>
    <header>
        <?php
        require_once('template/header.php');
        ?>
    </header>
    <div class="container">
        <div class="portada">
            <img src="public/images/portada1.jpg" alt="portada" srcset="" width="100%">
        </div>
        <hr>
        <h3 class="h3 text-primary mb-3"><i class="bi bi-person-fill"></i> Pacientes</h3>
        <div class="grid-bienvenida gap-2">
            <div class="gridA">
                <div class="bg-primary text-white p-2 fw-bold">
                    <i class="bi bi-search px-2"></i>Buscador
                </div>
                <form action="./?op=buscador&med=<?php echo $_SESSION['id']; ?>" method="post">
                    <div class="form-floating m-3">
                        <input type="text" name="buscar" class="form-control" id="floatingInput" placeholder="Nombre o Apellido" required>
                        <label for="floatingInput">Ingrese la cedula o nombre del paciente</label>
                    </div>
                    <div class="entrar d-grid gap-2 m-3">
                        <button class="btn btn-outline-dark p-2" type="submit">Buscar paciente</button>
                    </div>
                </form>
            </div>
            <div class="gridB">
                <div class="bg-primary text-white p-2 fw-bold">
                    <i class="bi bi-journal-medical px-2"></i>Citas Pendientes
                </div>
                <table class="table font-opciones">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Motivo</th>
                            <th>Fecha de cita asignada</th>
                            <th class="text-center">Ver Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Datoscita as $lc) { ?>
                            <tr>
                                <td><?php echo $lc->nombre . " " . $lc->apellido; ?></td>
                                <td><?php echo $lc->motivo; ?></td>
                                <td>
                                    <?php echo $lc->comienzo;?>
                                </td>
                                <td class="text-center"><a href="./?op=expedientepac&pac=<?php echo $lc->id_paciente ?>" class="btn btn-warning"><i class="bi bi-eye-fill"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <?php
        require_once('template/footer.php');
        ?>
    </footer>
</body>

</html>