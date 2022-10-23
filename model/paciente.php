<?php

class Pacientes
{

    private $pdo;
    private $msg;

    public function __construct()
    {
        try {
            $this->pdo = DB::Connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerPacientes($id)
    {
        try {
            $sql = "SELECT *, TIMESTAMPDIFF(YEAR,nacimiento,CURDATE()) as 'edad' FROM paciente WHERE id_medico=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
