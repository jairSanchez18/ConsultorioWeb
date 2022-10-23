<?php

include 'controller/controller.php';

$controller = new Controller();

if (isset($_GET['op'])) {
    $opcion = $_GET['op'];

    if ($opcion == "login") {
        $controller->login();
    } else if ($opcion == "acceder") {
        $controller->bienvenida();
    } else if ($opcion == "validar") {
        $controller->validar();
    } else if ($opcion == "salir") {
        $controller->salir();
    } else if ($opcion == "paciente") {
        $controller->paciente();
    } else if ($opcion == "reporte") {
        $controller->reporte();
    } else if ($opcion == "expediente") {
        $controller->expediente();
    } else if ($opcion == "guardarexpediente") {
        $controller->GuardarExpediente();
    } else if ($opcion == "perfil") {
        $controller->perfil();
    } else if ($opcion == "expedientepac") {
        $controller->expedientepac();
    } else if ($opcion == "buscador") {
        $controller->buscador();
    } else if ($opcion == "actualizarperfil") {
        $controller->Actualizar();
    } else if ($opcion == "actualizarcontraseña") {
        $controller->ActualizarContraseña();
    } else if ($opcion == "general") {
        $controller->InfoGeneral();
    }else if ($opcion == "infoantecedente") {
        $controller->GuardarAntecedente();
    } else {
        $controller->error404();
    }
} else {
    $controller->login();
}
