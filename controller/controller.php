<?php
session_start();

class Controller
{

    public function login()
    {
        require('view/login.php');
    }

    public function bienvenida()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/bienvenida.php");
        }
    }

    public function contactenos()
    {
        require('view/contactenos.php');
    }

    public function error404()
    {
        require('view/error404.php');
    }

    public function validar()
    {
        $usuario = $_REQUEST['user'];
        $password = $_REQUEST['pass'];

        if ($usuario == "keneth" && $password == "12345") {
            $_SESSION["user"] = $usuario . " " . "Sanchez";
            $_SESSION["acceso"] = true;
            header('Location: ?op=acceder');
        } else {
            header('Location: ?op=login&msg=Usuario o contraseña Incorrecta&t=text-danger');
        }
    }

    public function salir()
    {
        @session_destroy();
        require('view/login.php');
    }

    public function paciente()
    {
        require('view/pacientes.php');
    }

    public function reporte()
    {
        require('view/reportes.php');
    }

    public function expediente()
    {
        require('view/expedientes.php');
    }

    public function expedientepac()
    {
        require('view/expedientepac.php');
    }

    public function buscador()
    {
        require('view/buscador.php');
    }

    public function perfil()
    {
        require('view/perfil.php');
    }
}
