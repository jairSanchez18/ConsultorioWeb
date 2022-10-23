<?php

include 'model/database.php';

class Medico
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

    //Verifica usuario y contraseña para login
    public function ValidarMedico(medico $data)
    {
        try {
            $sql = "SELECT * FROM credenciales WHERE email=? AND pass=?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->email,
                    $data->pass
                )
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Trae la informacion general del medico
    public function Obtener($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM medico WHERE id = ?");
                
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
