<?php
session_start();

require_once 'model/medico.php';

class Controller
{
    private $medicoModel;

    public function __construct()
    {
        $this->medicoModel = new Medico();
    }

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
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/contactenos.php");
        }
    }

    public function error404()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/error404.php");
        }
    }

    public function validar()
    {
        $medico = new Medico();

        $medico->email = $_REQUEST['email'];
        $medico->pass = $_REQUEST['pass'];

        if ($resultado = $this->medicoModel->ValidarMedico($medico)) {
            $_SESSION['id'] = $resultado->id_medico;
            
            $datos = $this->medicoModel->Obtener($_SESSION['id']);
            $_SESSION['acceso'] = true;
            $_SESSION['user'] = $datos->nombre." ".$datos->apellido;
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
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/pacientes.php");
        }
    }

    public function reporte()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/reportes.php");
        }
    }

    public function expediente()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/expedientes.php");
        }
    }

    public function expedientepac()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/expedientepac.php");
        }
    }

    public function buscador()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/buscador.php");
        }
    }

    public function perfil()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            require("view/perfil.php");
        }
    }
}
