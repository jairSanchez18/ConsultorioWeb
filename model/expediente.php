<?php

class Expediente{

    private $pdo;
    private $msg;

    public $nombre;
    public $apellido;
    public $sexo;
    public $cedula;
    public $seguro;
    public $procedencia;
    public $habitacion;
    public $telefono;
    public $ingreso;
    public $servicio;
    public $medico;
    public $enfermera;
    public $direccion;
    public $cama;
    public $identificacion;
    public $email;

    public function __construct()
    {
        try {
            $this->pdo = DB::Connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CrearExpediente(expediente $data){
        try{
            $sql = "INSERT INTO paciente (id_medico, nombre, apellido, sexo, cedula,
            seguro, procedencia, habitacion, telefono, ingreso, servicio, medico, enfermera, direccion, cama, identificacion, email, nacimiento)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->id_medico,
                $data->nombre,
                $data->apellido,
                $data->sexo,
                $data->cedula,
                $data->seguro,
                $data->procedencia,
                $data->habitacion,
                $data->telefono,
                $data->ingreso,
                $data->servicio,
                $data->medico,
                $data->enfermera,
                $data->direccion,
                $data->cama,
                $data->identificacion,
                $data->email,
                $data->nacimiento
            ));
    
            return $this->msg = "El expediente del paciente fue creado con exito&t=text-success";
        }catch(Exception $e){
            die($e->getMessage());
            return $this->msg = "Error al crear el expediente del paciente&t=text-danger";
        }
    }

    public function VerExpediente($idpaciente)
    {
        try {
            $sql = "SELECT * FROM paciente WHERE id=?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($idpaciente));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GuardarInfoGeneral(expediente $data)
    {
        try {
            $sql = "UPDATE paciente SET nombre=?, apellido=?, sexo=?, seguro=?, procedencia=?, habitacion=?, telefono=?, 
        ingreso=?, servicio=?, medico=?, enfermera=?, direccion=?, cama=?, email=?, nacimiento=? WHERE id=?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->nombre,
                $data->apellido,
                $data->sexo,
                $data->seguro,
                $data->procedencia,
                $data->habitacion,
                $data->telefono,
                $data->ingreso,
                $data->servicio,
                $data->medico,
                $data->enfermera,
                $data->direccion,
                $data->cama,
                $data->email,
                $data->nacimiento,
                $data->id_pac
            ));

            return $this->msg = "Informacion general actualizada con exito&t=text-success";
        } catch (Exception $e) {
            die($e->getMessage());
            return $this->msg = "Ocurrio un error al actualizar la informacion&t=text-danger";
        }
    }
}