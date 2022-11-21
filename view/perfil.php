<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script>
        function validar(){
            var pass1 = document.formulario.pass1.value;
            var pass2 = document.formulario.pass2.value;

            if(pass1 != pass2){
                alert("las nuevas contraseñas deben ser iguales");
                return false;
            }
        }
    </script>
</head>

<body>
    <header>
        <?php
        require_once('template/header.php');
        ?>
    </header>
    <div class="container mb-5">
        <div class="text-primary mt-5">
            <h3 class="h3"><i class="bi bi-person-circle px-2"></i>Perfil de usuario</h3>
        </div>
        <hr class="mb-5">
        <div class="bg-primary text-white p-2 fw-bold">
            <i class="bi bi-pencil-fill px-2"></i>Informacion de usuario
        </div>
        <div class="border p-2">
            <div class="">
                <div class="perfilA">
                    <div class="text-center mb-5">
                        <img src="public/images/user.png" alt="" srcset="" width="300">
                        <h3 class="h3">Bienvenido <?php echo $_SESSION['user'] ?></h3>
                    </div>
                    <div class="text-start">
                        <p class="<?php if(isset($_GET['t'])){ echo $_GET['t']; } ?>"><?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></p>
                        <p class="<?php if(isset($_GET['t2'])){ echo $_GET['t2']; } ?>"><?php if(isset($_GET['msg2'])){ echo $_GET['msg2']; } ?></p>
                    </div>
                </div>
                <div class="perfilB">
                    <form action="./?op=actualizarperfil" method="POST" class="mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" value="<?php echo $medico->nombre; ?>" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Nombre (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="apellido" value="<?php echo $medico->apellido; ?>" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Apellido (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                        <select class="form-select" name="especialidad" id="floatingSelect" aria-label="Floating label select example" required>
                                <?php foreach ($espec as $e) { ?>
                                <option value="<?php echo $e->id ?>" <?php if($medico->id_especialidad == $e->id){ echo "selected"; } ?>><?php echo $e->especialidad ?></option>
                                <?php } ?>
                            </select>
                            <label for="floatingSelect">Especialidad (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="cedula" value="<?php echo $medico->cedula; ?>" class="form-control" id="floatingInput" placeholder="id" disabled>
                            <label for="floatingInput">Cedula (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="sexo" id="floatingSelect" aria-label="Floating label select example" required>
                                <option value="Masculino" <?php if($medico->sexo == "Masculino"){ echo "selected"; } ?> >Masculino</option>
                                <option value="Femenino" <?php if($medico->sexo == "Femenino"){ echo "selected"; } ?>>Femenino</option>
                            </select>
                            <label for="floatingSelect">Sexo (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" value="<?php echo $medico->email; ?>" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Correo Electronico (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="nacimiento" value="<?php echo $medico->nacimiento; ?>" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Fecha de Nacimiento (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="telefono" value="<?php echo $medico->telefono; ?>" class="form-control" id="floatingInput" placeholder="id">
                            <label for="floatingInput">Telefono (Opcional)</label>
                        </div>
                        <div class="entrar d-grid gap-2">
                            <button class="btn btn-success p-2" type="submit"><i class="bi bi-arrow-repeat px-2"></i>Actualizar Datos</button>
                        </div>
                    </form>
                    <form action="./?op=actualizarcontraseña" method="POST" name="formulario" onsubmit="return validar()">
                        <div class="form-floating mb-3">
                            <input type="password" name="passprincipal" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Clave Anterior (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="pass1" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Nueva Clave (Obligatorio)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="pass2" class="form-control" id="floatingInput" placeholder="id" required>
                            <label for="floatingInput">Confirmar Clave (Obligatorio)</label>
                        </div>
                        <div class="entrar d-grid gap-2">
                            <button class="btn btn-success p-2" type="submit"><i class="bi bi-arrow-repeat px-2"></i>Cambiar Contraseña</button>
                        </div>
                    </form>
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