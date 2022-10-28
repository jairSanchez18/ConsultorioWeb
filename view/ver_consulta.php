<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pacientes</title>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit-icons.min.js"></script>


    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

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
            <h3 class="h3 text-primary"><i class="bi bi-person-fill px-2"></i>Consulta del paciente: <?php echo $Datosexpediente->nombre . " " . $Datosexpediente->apellido;  ?></h3>
        </div>
        <hr class="mb-5">
        <div class="text-start">
            <p class="<?php if (isset($_GET['t'])) {
                            echo $_GET['t'];
                        } ?>"><?php if (isset($_GET['msg'])) {
                                    echo $_GET['msg'];
                                } ?></p>
        </div>
        <div>
            <a href="./?op=expedientepac&pac=<?php echo $_GET['pac'] ?>" class="btn btn-warning mb-3 p-2 text-decoration-none"><i class="bi bi-house-heart"></i> Volver al expediente del paciente</a>
        </div>
        <div class="bg-primary text-white p-2 fw-bold">
            <i class="bi bi-person-fill px-2"></i>Informacion de la consulta medica
        </div>
        <div class="border p-2">
            <form action="./?op=actualizarconsulta&id=<?php echo $Datosexpediente->id ?>&pac=<?php echo $Datosexpediente->id_paciente ?>" method="POST">
                <div class="lista-consulta">
                    <div class="">
                        <div class="form-floating mb-3">
                            <input type="datetime-local" value="<?php echo $Datosexpediente->comienzo ?>" name="comienzo" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Comienzo (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" value="<?php echo $Datosexpediente->finalizacion ?>" name="finalizacion" class="form-control" id="floatingInput" placeholder="Nombre" required>
                            <label for="floatingInput">Finalizacion (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="lugar" id="floatingSelect" aria-label="Floating label select example" required>
                                <option value="consultorio" <?php if ($Datosexpediente->lugar == "consultorio") {
                                                                echo "selected";
                                                            } ?>>Consultorio</option>
                                <option value="hospital" <?php if ($Datosexpediente->lugar == "hospital") {
                                                                echo "selected";
                                                            } ?>>Hospital</option>
                                <option value="domicilio" <?php if ($Datosexpediente->lugar == "domicilio") {
                                                                echo "selected";
                                                            } ?>>Visita a domicilio</option>
                            </select>
                            <label for="floatingSelect">Lugar (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="motivo" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required><?php echo $Datosexpediente->motivo ?></textarea>
                            <label for="floatingTextarea">Motivo de la Consulta (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="examen" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required><?php echo $Datosexpediente->examen ?></textarea>
                            <label for="floatingTextarea">Examen Fisico (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="diagnostico" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required><?php echo $Datosexpediente->diagnostico ?></textarea>
                            <label for="floatingTextarea">Diagnostico (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="recomendaciones" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required><?php echo $Datosexpediente->recomendaciones ?></textarea>
                            <label for="floatingTextarea">Recomendaciones (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="receta" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" required><?php echo $Datosexpediente->receta ?></textarea>
                            <label for="floatingTextarea">Receta (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="observaciones" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;"><?php echo $Datosexpediente->observaciones ?></textarea>
                            <label for="floatingTextarea">Observaciones (Opcional)</label>
                        </div>
                    </div>
                </div>
                <div class="entrar d-grid gap-2">
                    <button class="btn btn-success p-2" type="submit"><i class="bi bi-arrow-repeat px-2"></i>Guardar cambios de la Consulta</button>
                </div>
            </form>
        </div>
        <footer uk-sticky="position: bottom">
            <?php
            require_once('template/footer.php');
            ?>
        </footer>
</body>

</html>