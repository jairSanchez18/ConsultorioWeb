<?php

class Reportes
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = DB::Connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CantidadHombres()
    {
        try {
            $sql = "SELECT count(sexo) as 'sexo' FROM paciente WHERE sexo ='Masculino'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CantidadMujeres()
    {
        try {
            $sql = "SELECT count(sexo) as 'sexo' FROM paciente WHERE sexo ='Femenino'";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Edades()
    {
        try {
            $sql = "CALL Edades";

            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
