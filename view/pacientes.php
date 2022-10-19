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

</head>

<body>
    <header>
        <?php
        require_once('template/header.php');
        ?>
    </header>
    <div class="container">
        <div class="text-primary mt-5">
            <h3 class="h3"><i class="bi bi-journal-medical px-2"></i>Información general de los pacientes</h3>
        </div>
        <hr class="mb-5">
        <div class="bg-primary text-white p-2 fw-bold">
            <i class="bi bi-person-fill px-2"></i>Lista de Pacientes
        </div>
        <table class="table table-pacientes">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Información</th>
                    <th class="text-center">Ver Detalles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan</td>
                    <td>Sapata</td>
                    <td>Nacimiento: 15 de septiembre de 1998 <br>
                        Edad: 24 Años <br>
                        Email: Juan@Correo.com</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle font-opciones" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones Generales
                            </button>
                            <ul class="dropdown-menu font-opciones">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Juan</td>
                    <td>Sapata</td>
                    <td>Nacimiento: 15 de septiembre de 1998 <br>
                        Edad: 24 Años <br>
                        Email: Juan@Correo.com</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle font-opciones" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones Generales
                            </button>
                            <ul class="dropdown-menu font-opciones">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Juan</td>
                    <td>Sapata</td>
                    <td>Nacimiento: 15 de septiembre de 1998 <br>
                        Edad: 24 Años <br>
                        Email: Juan@Correo.com</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle font-opciones" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones Generales
                            </button>
                            <ul class="dropdown-menu font-opciones">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer>
        <?php
        require_once('template/footer.php');
        ?>
    </footer>
</body>

</html>