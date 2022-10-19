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
    }else if ($opcion == "pacientes") {
        $controller->pacientes();
    }  else {
        $controller->error404();
    }
} else {
    $controller->login();
}
