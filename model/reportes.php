<?php

class Reportes
{
    private $pdo;

    public $id_medico;

    public function __construct()
    {
        try {
            $this->pdo = DB::Connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CantidadHombres(reportes $data)
    {
        try {
            $sql = "SELECT count(sexo) as 'sexo' FROM paciente WHERE sexo ='Masculino' AND id_medico=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($data->id_medico));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CantidadMujeres(reportes $data)
    {
        try {
            $sql = "SELECT count(sexo) as 'sexo' FROM paciente WHERE sexo ='Femenino' AND id_medico=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($data->id_medico));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Edades(reportes $data)
    {
        try {
            $sql = "CALL Edades(?)";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($data->id_medico));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
