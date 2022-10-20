<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pacientes</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
        .col {
            margin-bottom: 5px;
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
        <div class="text-primary mt-5">
            <h3 class="h3"><i class="bi bi-journal-medical px-2"></i>Reportes Generales del consultorio</h3>
        </div>
        <hr class="mb-5">
        <div class="container table-pacientes">
            <div class="grid-bienvenida gap-2">
                <div class="gridA border">
                    <div class="bg-primary text-white p-2 fw-bold">
                        <i class="bi bi-person-fill px-2"></i>Cantidad de pacientes
                    </div>
                    <div class="mt-3 px-2">
                        <p class="fw-bold">pacientes por sexo:</p>
                        <div class="row">
                            <div class="col"><i class="bi bi-gender-male px-1"></i> Masculinos:</div>
                            <div class="col">1</div>
                        </div>
                        <div class="row">
                            <div class="col"><i class="bi bi-gender-female px-1"></i>Femeninos:</div>
                            <div class="col">1</div>
                        </div>
                        <p class="mt-5 fw-bold">pacientes por edad:</p>
                        <div class="row">
                            <div class="col">Infantes (0-2):</div>
                            <div class="col">1</div>
                        </div>
                        <div class="row">
                            <div class="col">Preescolar (2-7):</div>
                            <div class="col">1</div>
                        </div>
                        <div class="row">
                            <div class="col">Escolares (7-12):</div>
                            <div class="col">1</div>
                        </div>
                        <div class="row">
                            <div class="col">Adolecentes (12-18):</div>
                            <div class="col">1</div>
                        </div>
                        <div class="row">
                            <div class="col">Adulto (18-65):</div>
                            <div class="col">1</div>
                        </div>
                        <div class="row">
                            <div class="col">Adultos mayores (65-):</div>
                            <div class="col">1</div>
                        </div>
                    </div>
                </div>
                <div class="gridB border">
                    <div class="bg-primary text-white p-2 fw-bold">
                        <i class="bi bi-journal-medical px-2"></i>Registro de medicamentos
                    </div>
                    <table class="table font-opciones">
                        <thead>
                            <tr>
                                <th>Medicamento</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Panadol</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Panadol</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="border mt-4">
                <div class="bg-primary text-white p-2 fw-bold">
                    <i class="bi bi-pie-chart px-2"></i>Grafica de datos
                </div>
                <div class="text-center">
                    <img src="public/images/user.png" alt="" srcset="" width="400">
                </div>
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