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
            <h3 class="h3 text-primary"><i class="bi bi-person-fill px-2"></i>Expediente del paciente: <?php echo $Datosexpediente->nombre . " " . $Datosexpediente->apellido;  ?></h3>
        </div>
        <hr class="mb-5">
        <div class="text-start">
            <p class="<?php if(isset($_GET['t'])){ echo $_GET['t']; } ?>"><?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></p>
        </div>
        <div class="bg-primary text-white p-2 fw-bold">
            <i class="bi bi-person-fill px-2"></i>Informacion del expediente
        </div>
        <div class="border p-2">
            <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li><a href="#"><i class="bi bi-journal-medical px-2"></i>Informacion General</a></li>
                <li><a href="#"><i class="bi bi-hourglass px-2"></i>Antecendentes</a></li>
                <li><a href="#"><i class="bi bi-file-person px-2"></i>Consultas Medicas</a></li>
                <li><a href="#"><i class="bi bi-calendar px-2"></i>Citas</a></li>
            </ul>

            <ul class="uk-switcher uk-margin">
                <li>
                    <form action="./?op=general&pac=<?php echo $Datosexpediente->id ?>" method="POST">
                        <div class="grid-informacion">
                            <div class="expedA">
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->identificacion; ?>" type="text" name="identificacion" class="form-control" id="floatingInput" placeholder="id" disabled>
                                    <label for="floatingInput">Numero de Identificación</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->nombre; ?>" type="text" name="nombre" class="form-control" id="floatingInput" placeholder="Nombre" required>
                                    <label for="floatingInput">Nombre (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->apellido; ?>" type="text" name="apellido" class="form-control" id="floatingInput" placeholder="Apellido" required>
                                    <label for="floatingInput">Apellido (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="sexo" id="floatingSelect" aria-label="Floating label select example" required>
                                        <option value="Masculino" <?php if ($Datosexpediente->sexo == "Masculino") {
                                                                        echo "selected";
                                                                    } ?>>Masculino</option>
                                        <option value="Femenino" <?php if ($Datosexpediente->sexo == "Femenino") {
                                                                        echo "selected";
                                                                    } ?>>Femenino</option>
                                    </select>
                                    <label for="floatingSelect">Sexo (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->cedula; ?>" type="text" name="cedula" class="form-control" id="floatingInput" placeholder="cedula" disabled>
                                    <label for="floatingInput">Cedula de Identidad (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->seguro; ?>" type="text" name="segurosocial" class="form-control" id="floatingInput" placeholder="seguro social">
                                    <label for="floatingInput">Seguro social (Opcional)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->procedencia; ?>" type="text" name="procedencia" class="form-control" id="floatingInput" placeholder="direccion">
                                    <label for="floatingInput">Indicacion de procedencia (Opcional)</label>
                                </div>
                                <div class="form-floating mb-3">
                            <input value="<?php echo $Datosexpediente->email; ?>" type="email" name="email" class="form-control" id="floatingInput" placeholder="direccion" required>
                            <label for="floatingInput">Correo electronico (Obligatorio)</label>
                        </div>
                            </div>
                            <div class="expedB">
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->telefono; ?>" type="text" name="telefono" class="form-control" id="floatingInput" placeholder="telefono" required>
                                    <label for="floatingInput">Telefono celular (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->ingreso; ?>" type="date" name="ingreso" class="form-control" id="floatingInput" placeholder="direccion" required>
                                    <label for="floatingInput">Fecha de Ingreso</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="servicio" id="floatingSelect" aria-label="Floating label select example" required>
                                        <option value="Ambulancia" <?php if ($Datosexpediente->servicio == "Ambulancia") {
                                                                        echo "selected";
                                                                    } ?>>Ambulancia</option>
                                        <option value="Helicoptero" <?php if ($Datosexpediente->servicio == "Helicoptero") {
                                                                        echo "selected";
                                                                    } ?>>Helicoptero</option>
                                        <option value="Guardía Costera" <?php if ($Datosexpediente->servicio == "Guardía Costera") {
                                                                            echo "selected";
                                                                        } ?>>Guardía Costera</option>
                                        <option value="paciente" <?php if ($Datosexpediente->servicio == "paciente") {
                                                                        echo "selected";
                                                                    } ?>>Paciente</option>
                                        <option value="ninguna" <?php if ($Datosexpediente->servicio == "ninguna") {
                                                                    echo "selected";
                                                                } ?>>Ninguna de las anteriores</option>
                                    </select>
                                    <label for="floatingSelect">Servicio que presta asistencia (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->medico; ?>" type="text" name="medico" class="form-control" id="floatingInput" placeholder="medico" required>
                                    <label for="floatingInput">Medico Responsable (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->enfermera; ?>" type="text" name="enfermera" class="form-control" id="floatingInput" placeholder="medico">
                                    <label for="floatingInput">Enfermera/o en turno (Opcional)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->direccion; ?>" type="text" name="direccion" class="form-control" id="floatingInput" placeholder="direccion" required>
                                    <label for="floatingInput">Direccion de domicilio (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->cama; ?>" type="text" name="cama" class="form-control" id="floatingInput" placeholder="cama">
                                    <label for="floatingInput">Cama (Opcional)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $Datosexpediente->nacimiento; ?>" type="date" name="nacimiento" class="form-control" id="floatingInput" placeholder="direccion" required>
                                    <label for="floatingInput">Fecha de Nacimiento (Obligatorio)</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?php echo $Datosexpediente->habitacion; ?>" type="text" name="habitacion" class="form-control" id="floatingInput" placeholder="habitacion">
                            <label for="floatingInput">Habitacion (Opcional)</label>
                        </div>
                        <div class="entrar d-grid gap-2">
                            <button class="btn btn-success p-2" type="submit"><i class="bi bi-arrow-repeat px-2"></i>Guardar Cambios</button>
                        </div>
                    </form>
                </li>
                <li>
                    <form action="./?op=antec&pac=<?php echo $Datosexpediente->id ?>" method="POST">
                        <div class="grid-informacion">
                            <div class="expedA">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="patologicos" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"><?php echo $Datosantecedentes->patologicos; ?></textarea>
                                    <label for="floatingTextarea">Patologicos</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="nopatologicos" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"><?php echo $Datosantecedentes->no_patologicos; ?></textarea>
                                    <label for="floatingTextarea">No Patologicos</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea  class="form-control" name="familiares" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"><?php echo $Datosantecedentes->familiares; ?></textarea>
                                    <label for="floatingTextarea">Familiares</label>
                                </div>
                            </div>
                            <div class="expedB">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="quirurjicos" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"><?php echo $Datosantecedentes->quirurgicos; ?></textarea>
                                    <label for="floatingTextarea">Quirurgicos</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="alergias" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"><?php echo $Datosantecedentes->alergias; ?></textarea>
                                    <label for="floatingTextarea">Alergias</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="medicamentos" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"><?php echo $Datosantecedentes->medicamentos; ?></textarea>
                                    <label for="floatingTextarea">Medicamentos</label>
                                </div>
                            </div>
                        </div>
                        <div class="entrar d-grid gap-2">
                            <button class="btn btn-success p-2" type="submit"><i class="bi bi-arrow-repeat px-2"></i>Guardar Cambios</button>
                        </div>
                    </form>
                </li>
                <li>
                    <form action="#" method="POST">
                        <div class="grid-expediente lista-consulta">
                            <div class="expeA">
                                <div class="bg-dark text-white p-2 fw-bold mb-3">
                                    <i class="bi bi-pencil-fill px-2"></i>Crear consulta medica
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="comienzo" class="form-control" id="floatingInput" placeholder="id" required>
                                    <label for="floatingInput">Comienzo (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="final" class="form-control" id="floatingInput" placeholder="Nombre" required>
                                    <label for="floatingInput">Finalizacion (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="lugar" id="floatingSelect" aria-label="Floating label select example" required>
                                        <option value="consultorio" selected>Consultorio</option>
                                        <option value="hospital">Hospital</option>
                                        <option value="domicilio">Visita a domicilio</option>
                                    </select>
                                    <label for="floatingSelect">Lugar (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="motivo" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required></textarea>
                                    <label for="floatingTextarea">Motivo de la Consulta (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="examenfisico" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required></textarea>
                                    <label for="floatingTextarea">Examen Fisico (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="diagnostico" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required></textarea>
                                    <label for="floatingTextarea">Diagnostico (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="recomendacion" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required></textarea>
                                    <label for="floatingTextarea">Recomendaciones (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="receta" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required></textarea>
                                    <label for="floatingTextarea">Receta (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="observacion" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"></textarea>
                                    <label for="floatingTextarea">Observaciones (Opcional)</label>
                                </div>

                            </div>
                            <div class="expeB">
                                <div class="bg-dark text-white p-2 fw-bold mb-3">
                                    <i class="bi bi-book px-2"></i>Lista de consultas
                                </div>
                                <table class="table font-opciones">
                                    <thead>
                                        <tr>
                                            <th>Paciente</th>
                                            <th>Motivo</th>
                                            <th>Fecha de cita</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Juan Sapata</td>
                                            <td>Dolores Musculares</td>
                                            <td>22/11/2022</td>
                                        </tr>
                                        <tr>
                                            <td>Juan Sapata</td>
                                            <td>Radiografía</td>
                                            <td>01/02/2023</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="entrar d-grid gap-2">
                            <button class="btn btn-success p-2" type="submit"><i class="bi bi-arrow-repeat px-2"></i>Crear Consulta</button>
                        </div>
                    </form>
                </li>
                <li>
                    <form action="#" method="POST">
                        <div class="grid-expediente lista-consulta">
                            <div class="expeA">
                                <div class="bg-dark text-white p-2 fw-bold mb-3">
                                    <i class="bi bi-pencil-fill px-2"></i>Crear cita
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="comienzo" class="form-control" id="floatingInput" placeholder="id" required>
                                    <label for="floatingInput">Comienzo (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="final" class="form-control" id="floatingInput" placeholder="Nombre" required>
                                    <label for="floatingInput">Finalizacion (Obligatorio)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="actividad" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required></textarea>
                                    <label for="floatingTextarea">Motivo (Obligatorio)</label>
                                </div>

                            </div>
                            <div class="expeB">
                                <div class="bg-dark text-white p-2 fw-bold mb-3">
                                    <i class="bi bi-book px-2"></i>Lista de citas
                                </div>
                                <table class="table font-opciones">
                                    <thead>
                                        <tr>
                                            <th>Paciente</th>
                                            <th>Motivo</th>
                                            <th>Fecha de cita</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Juan Sapata</td>
                                            <td>Dolores Musculares</td>
                                            <td>22/11/2022</td>
                                        </tr>
                                        <tr>
                                            <td>Juan Sapata</td>
                                            <td>Radiografía</td>
                                            <td>01/02/2023</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="entrar d-grid gap-2">
                            <button class="btn btn-success p-2" type="submit"><i class="bi bi-arrow-repeat px-2"></i>Crear Cita</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <footer uk-sticky="position: bottom">
        <?php
        require_once('template/footer.php');
        ?>
    </footer>
</body>

</html>