<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Expediente</title>

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
            <h3 class="h3"><i class="bi bi-journal-medical px-2"></i>Crear un nuevo expediente clinico</h3>
        </div>
        <hr class="mb-5">
        <div class="text-start">
            <p class="<?php if (isset($_GET['t'])) {
                echo $_GET['t'];
            } ?>">
                <?php if (isset($_GET['msg'])) {
                    echo $_GET['msg'];
                } ?>
            </p>
        </div>
        <div class="bg-primary text-white p-2 fw-bold">
            <i class="bi bi-pencil-fill px-2"></i>Lleno los campos requeridos
        </div>
        <div class="border p-2">
            <form action="./?op=guardarexpediente" method="POST" name="formulario">
                <div class="grid-expediente">
                    <div class="expeA">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" name="identificacion" class="form-control" id="floatingInput"
                                placeholder="id" disabled>
                            <label for="floatingInput">Numero de Identificación</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" class="form-control" id="floatingInput"
                                placeholder="Nombre" required>
                            <label for="floatingInput">Nombre (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="apellido" class="form-control" id="floatingInput"
                                placeholder="Apellido" required>
                            <label for="floatingInput">Apellido (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="sexo" id="floatingSelect"
                                aria-label="Floating label select example" required>
                                <option value="Masculino" selected>Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                            <label for="floatingSelect">Sexo (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="cedula" class="form-control" id="floatingInput"
                                placeholder="cedula" required>
                            <label for="floatingInput">Cedula de Identidad (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="segurosocial" class="form-control" id="floatingInput"
                                placeholder="seguro social">
                            <label for="floatingInput">Seguro social (Opcional)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="nacimiento" class="form-control" id="floatingInput"
                                placeholder="direccion" required>
                            <label for="floatingInput">Fecha de Nacimiento (Obligatorio)</label>
                        </div>
                    </div>
                    <div class="expeB mt-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="telefono" class="form-control" id="floatingInput"
                                placeholder="telefono" required>
                            <label for="floatingInput">Telefono celular (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="ingreso" class="form-control" id="floatingInput"
                                placeholder="direccion" required>
                            <label for="floatingInput">Fecha de Ingreso (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="servicio" id="floatingSelect"
                                aria-label="Floating label select example" required>
                                <option value="Ambulancia" selected>Ambulancia</option>
                                <option value="Helicoptero">Helicoptero</option>
                                <option value="Guardía Costera">Guardía Costera</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                            <label for="floatingSelect">Servicio que presta asistencia (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $_SESSION['user']; ?>" name="medico"
                                class="form-control" id="floatingInput" placeholder="medico" required>
                            <label for="floatingInput">Medico Responsable (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="enfermera" class="form-control" id="floatingInput"
                                placeholder="medico">
                            <label for="floatingInput">Enfermera/o en turno (Opcional)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="direccion" class="form-control" id="floatingInput"
                                placeholder="direccion" required>
                            <label for="floatingInput">Direccion de domicilio (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="direccion" required>
                            <label for="floatingInput">Correo electronico (Obligatorio)</label>
                        </div>
                    </div>
                </div>
                <label for="" class="text-danger px-2">En caso de quedarse</label>
                <div class="form-floating mb-3">
                    <input type="text" name="cama" class="form-control" id="floatingInput" placeholder="cama">
                    <label for="floatingInput">Cama (Opcional)</label>
                </div>
                <label for="" class="text-danger px-2">En caso de quedarse</label>
                <div class="form-floating mb-3">
                    <input type="text" name="habitacion" class="form-control" id="floatingInput"
                        placeholder="habitacion">
                    <label for="floatingInput">Habitacion (Opcional)</label>
                </div>
                <label for="" class="text-danger px-2">Si proviene de otro centro medico</label>
                <div class="form-floating mb-3">
                    <input type="text" name="procedencia" class="form-control" id="floatingInput"
                        placeholder="direccion">
                    <label for="floatingInput">Indicacion de procedencia (Opcional)</label>
                </div>
                <div class="entrar d-grid gap-2">
                    <button class="btn btn-success p-2" type="submit"><i
                            class="bi bi-arrow-repeat px-2"></i>Guardar
                        Expediente Clinico</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <?php
        require_once('template/footer.php');
        ?>
    </footer>
</body>

</html>