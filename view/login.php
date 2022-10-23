<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>

    <title>Acceder al consultorio</title>
</head>

<body>
    <header>
        <?php
        require_once('template/headerlogin.php');
        ?>
    </header>

    <div class="container-fluid">
        <div class="row p-3">
            <div class="col text-center">
                <img src="public/images/user.png" class="img-login" alt="" srcset="" width="600">
            </div>
            <div class="col formulario">
                <div class="login">
                    <div class="text-center title-login">
                        <h3 class="h3">Acceder al consultorio</h3>
                    </div>
                    <div class="">
                        <p class="mb-3 text-center <?php if(isset($_GET['t'])){ echo $_GET['t']; } ?>"><?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></p>
                        <form action="./?op=validar" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Correo Electronico</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                            <div class="entrar d-grid gap-2">
                                <button class="btn btn-outline-dark p-2" type="submit">Entrar al sistema</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php
        require_once('template/footerlogin.php');
        ?>
    </footer>
</body>

</html>