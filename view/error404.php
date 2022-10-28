<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    
    <title>Error - Pagina no encontrada</title>

    <style>
        footer{
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <?php
        require_once('template/headerlogin.php');
        ?>
    </header>
    <div class="container text-center mt-3">
        <img src="public/images/404.png" alt="" srcset="" width="500"><br>
        <a href="./?op=login">Volver al menu principal</a>
    </div>
    <footer>
        <?php
        require_once('template/footerlogin.php');
        ?>
    </footer>
</body>

</html>