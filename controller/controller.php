<?php
session_start();

require_once 'model/medico.php';
require_once 'model/expediente.php';
require_once 'model/paciente.php';

class Controller
{
    private $medicoModel;
    private $expedienteModel;
    private $pacientesModel;
    private $resp;

    public function __construct()
    {
        $this->medicoModel = new Medico();
        $this->expedienteModel = new Expediente();
        $this->pacientesModel = new Pacientes();
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
            $_SESSION['user'] = $datos->nombre . " " . $datos->apellido;
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
            $Listapaciente = new Pacientes();
            $Listapaciente = $this->pacientesModel->VerPacientes($_SESSION['id']);

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

    public function GuardarExpediente()
    {
        $expediente = new Expediente();

        $expediente->identificacion = rand(1, 100000);
        $expediente->nombre = $_REQUEST['nombre'];
        $expediente->apellido = $_REQUEST['apellido'];
        $expediente->sexo = $_REQUEST['sexo'];
        $expediente->cedula = $_REQUEST['cedula'];
        $expediente->seguro = $_REQUEST['segurosocial'];
        $expediente->telefono = $_REQUEST['telefono'];
        $expediente->ingreso = $_REQUEST['ingreso'];
        $expediente->servicio = $_REQUEST['servicio'];
        $expediente->medico = $_REQUEST['medico'];
        $expediente->enfermera = $_REQUEST['enfermera'];
        $expediente->direccion = $_REQUEST['direccion'];
        $expediente->cama = $_REQUEST['cama'];
        $expediente->habitacion = $_REQUEST['habitacion'];
        $expediente->procedencia = $_REQUEST['procedencia'];
        $expediente->email = $_REQUEST['email'];
        $expediente->nacimiento = $_REQUEST['nacimiento'];
        $expediente->id_medico = $_SESSION['id'];

        if ($this->resp = $this->expedienteModel->CrearExpediente($expediente)) {
            header('Location: ?op=expediente&msg=' . $this->resp);
        } else {
            header('Location: ?op=expediente&msg=' . $this->resp);
        }
    }

    public function expedientepac()
    {
        if ($_SESSION["acceso"] != true) {
            require("view/login.php");
            header('Location: ?op=login');
        } else {
            $Datosexpediente = new Expediente();
            $Datosantecedentes = new Expediente();
            $Datosantec = new Expediente();

            $Datosantecedentes->id_paciente = $_GET['pac'];

            $Datosexpediente = $this->expedienteModel->VerExpediente($Datosantecedentes);

            if ($this->expedienteModel->VerAntecedentes($Datosantecedentes)) {
                $Datosantec = $this->expedienteModel->VerAntecedentes($Datosantecedentes);
            }


            require("view/expedientepac.php");
        }
    }

    public function GuardarAntecedente()
    {
        $antecedente = new Expediente();

        $id_pac = $_GET['pac'];

        $antecedente->id_paciente = $_GET['pac'];
        $antecedente->patologicos = $_REQUEST['patologicos'];
        $antecedente->nopatologicos = $_REQUEST['nopatologicos'];
        $antecedente->cirugia = $_REQUEST['cirugia'];
        $antecedente->familiares = $_REQUEST['familiares'];
        $antecedente->medicamentos = $_REQUEST['medicamentos'];
        $antecedente->alergias = $_REQUEST['alergias'];


        if ($this->expedienteModel->VerAntecedentes($antecedente)) {
            if ($resp = $this->expedienteModel->ActualizarAntecedente($antecedente)) {
                header('Location: ?op=expedientepac&msg=' . $resp . '&pac=' . $id_pac);
            }
        } else {
            if ($resp = $this->expedienteModel->GuardarAntecedente($antecedente)) {
                header('Location: ?op=expedientepac&msg=' . $resp . '&pac=' . $id_pac);
            }
        }
    }

    public function InfoGeneral()
    {

        $expediente = new Expediente();

        $id_pac = $_GET['pac'];

        $expediente->nombre = $_REQUEST['nombre'];
        $expediente->apellido = $_REQUEST['apellido'];
        $expediente->sexo = $_REQUEST['sexo'];
        $expediente->seguro = $_REQUEST['segurosocial'];
        $expediente->telefono = $_REQUEST['telefono'];
        $expediente->ingreso = $_REQUEST['ingreso'];
        $expediente->servicio = $_REQUEST['servicio'];
        $expediente->medico = $_REQUEST['medico'];
        $expediente->enfermera = $_REQUEST['enfermera'];
        $expediente->direccion = $_REQUEST['direccion'];
        $expediente->cama = $_REQUEST['cama'];
        $expediente->habitacion = $_REQUEST['habitacion'];
        $expediente->procedencia = $_REQUEST['procedencia'];
        $expediente->email = $_REQUEST['email'];
        $expediente->nacimiento = $_REQUEST['nacimiento'];
        $expediente->id_pac = $_GET['pac'];

        if ($this->resp = $this->expedienteModel->GuardarInfoGeneral($expediente)) {
            header('Location: ?op=expedientepac&msg=' . $this->resp . '&pac=' . $id_pac);
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
            $medico = $this->medicoModel->Obtener($_SESSION['id']);

            require("view/perfil.php");
        }
    }

    public function Actualizar()
    {
        $medico = new Medico();

        $medico->nombre = $_REQUEST['nombre'];
        $medico->apellido = $_REQUEST['apellido'];
        $medico->sexo = $_REQUEST['sexo'];
        $medico->email = $_REQUEST['email'];
        $medico->nacimiento = $_REQUEST['nacimiento'];
        $medico->telefono = $_REQUEST['telefono'];
        $medico->id = $_SESSION['id'];

        $mensaje = "&msg2=";

        if ($this->medicoModel->VerificarCorreo($medico) <= 0) {
            $this->medicoModel->ActualizarCorreo($medico);
        } else {
            $mensaje = "&msg2=El correo ya se encuentra en uso&t2=text-danger";
        }

        if ($this->resp = $this->medicoModel->ActualizarPerfil($medico)) {
            $_SESSION['user'] = $_REQUEST['nombre'] . " " . $_REQUEST['apellido'];
            header('Location: ?op=perfil&msg=' . $this->resp . $mensaje);
        } else {
            header('Location: ?op=perfil&msg=' . $this->resp . $mensaje);
        }
    }

    public function ActualizarContraseña()
    {
        $medico = new Medico();

        $medico->passold = $_REQUEST['passprincipal'];
        $medico->passnueva = md5($_REQUEST['pass1']);
        $medico->id = $_SESSION['id'];

        if ($this->medicoModel->VerificarContraseña($medico) <= 0) {
            header('Location: ?op=perfil&msg=La contraseña actual es incorrecta&t=text-danger');
        } else {
            $this->medicoModel->ActualizarContraseña($medico);
            header('Location: ?op=perfil&msg=Contraseña actualizada&t=text-success');
        }
    }
}
