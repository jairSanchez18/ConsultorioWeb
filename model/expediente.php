<?php

class Expediente
{

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
    public $patologicos;
    public $nopatologicos;
    public $familiares;
    public $alergias;
    public $medicamentos;
    public $cirugia;

    public $id_paciente;
    public $comienzo;
    public $finalizacion;
    public $lugar;
    public $motivo;
    public $examen;
    public $diagnostico;
    public $recomendaciones;
    public $receta;
    public $observaciones;
    public $id_medico;

    public function __construct()
    {
        try {
            $this->pdo = DB::Connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CrearExpediente(expediente $data)
    {
        try {
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
        } catch (Exception $e) {
            die($e->getMessage());
            return $this->msg = "Error al crear el expediente del paciente&t=text-danger";
        }
    }

    public function VerExpediente(expediente $data)
    {
        try {
            $sql = "SELECT * FROM paciente WHERE id=?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($data->id_paciente));

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

    public function VerAntecedentes(expediente $data)
    {
        try {
            $sql = "SELECT * FROM antecedentes WHERE id_paciente=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->id_paciente
            ));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarAntecedente(expediente $data)
    {
        try {
            $sql = "UPDATE antecedentes SET patologicos=?, cirugia=?, nopatologicos=?,
            alergias=?, familiares=?, medicamentos=? WHERE id_paciente=?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->patologicos,
                $data->cirugia,
                $data->nopatologicos,
                $data->alergias,
                $data->familiares,
                $data->medicamentos,
                $data->id_paciente
            ));

            return $this->msg = "Los antecedentes del paciente fueron actualizado con exito&t=text-success";
        } catch (Exception $e) {
            die($e->getMessage());
            return $this->msg = "Error al actualizar los antecedentes del paciente&t=text-danger";
        }
    }

    public function GuardarAntecedente(expediente $data)
    {
        try {
            $sql = "INSERT INTO antecedentes (id_paciente, patologicos, cirugia, nopatologicos,
            alergias, familiares, medicamentos) VALUES (?,?,?,?,?,?,?)";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->id_paciente,
                $data->patologicos,
                $data->cirugia,
                $data->nopatologicos,
                $data->alergias,
                $data->familiares,
                $data->medicamentos
            ));

            return $this->msg = "Los antecedentes del paciente fueron actualizado con exito&t=text-success";
        } catch (Exception $e) {
            die($e->getMessage());
            return $this->msg = "Error al actualizar los antecedentes del paciente&t=text-danger";
        }
    }

    public function CrearConsulta(expediente $data)
    {
        try {
            $sql = "INSERT INTO consulta (id_paciente, comienzo, finalizacion, lugar, motivo, examen, diagnostico, recomendaciones, receta, observaciones)
            VALUES (?,?,?,?,?,?,?,?,?,?)";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->id_paciente,
                $data->comienzo,
                $data->finalizacion,
                $data->lugar,
                $data->motivo,
                $data->examen,
                $data->diagnostico,
                $data->recomendaciones,
                $data->receta,
                $data->observaciones
            ));

            return $this->msg = "Consulta creada con exito&t=text-success";
        } catch (Exception $e) {
            die($e->getMessage());
            return $this->msg = "Error al crear la consulta, verifique nuevamente&t=text-danger";
        }
    }

    //FALTA ARREGLAR
    public function VerConsulta(expediente $data)
    {
        try {
            $sql = "SELECT id_paciente, comienzo, finalizacion, lugar, motivo, examen, diagnostico, recomendaciones,
            receta, observaciones, p.nombre, p.apellido
            from consulta as c
            join paciente as p on c.id_paciente = p.id
            join medico as m where m.id = ? and id_paciente = ?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($data->id_medico, $data->id_paciente));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
