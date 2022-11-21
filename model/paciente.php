<?php

class Pacientes
{

    private $pdo;
    private $msg;
    public $id_medico;
    public $activo;

    public function __construct()
    {
        try {
            $this->pdo = DB::Connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerPacientes(Pacientes $data)
    {
        try {
            $sql = "SELECT *, TIMESTAMPDIFF(YEAR,nacimiento,CURDATE()) as 'edad' FROM paciente WHERE id_medico=? and activo = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                $data->id_medico,
                $data->activo
            ));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}