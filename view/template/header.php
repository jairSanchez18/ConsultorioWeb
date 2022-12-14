<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./?op=acceder">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pacientes
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="./?op=paciente">Ver pacientes activos</a>
                        <a class="dropdown-item" href="./?op=pacienteinactivo">Ver pacientes inactivos</a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?op=reporte">Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./?op=expediente">Nuevo Expediente</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./?op=permitido" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="public/images/user.png" alt="user-img" width="50" class="img-circle">
                        <span class="font-medium">
                            <?php echo $_SESSION['user'] ?>
                        </span></a>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./?op=perfil">Perfil</a></li>
                        <li><a class="dropdown-item" href="./?op=salir">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>