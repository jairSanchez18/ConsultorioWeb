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
                ->prepare("SELECT nombre, apellido, sexo, nacimiento, telefono, email, cedula
                            FROM medico AS M
                            JOIN credenciales as C on M.id = C.id WHERE M.id = ?");

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Actualizacion del perfil del medico
    public function ActualizarPerfil(medico $data){
        try{
            $sql = "UPDATE medico SET nombre=?, apellido=?, sexo=?, nacimiento=?, telefono=? WHERE id = ?";

            $this->pdo->prepare($sql)
            ->execute(array(
                $data->nombre,
                $data->apellido,
                $data->sexo,
                $data->nacimiento,
                $data->telefono,
                $data->id
            ));
            
            return $this->msg = "Se han guardado los cambios correctamente&t=text-success";
        }catch(Exception $e){
            die($e->getMessage());
            return $this->msg = "Ocurrio un Error en el sistema&t=text-danger";
        }
    }

    public function ActualizarCorreo(medico $data){
        try{
            $sql = "UPDATE credenciales SET email=? WHERE id_medico = ?";

            $this->pdo->prepare($sql)
            ->execute(array(
                $data->email,
                $data->id
            ));

        }catch(Exception $e){
            
        }
    }

    public function VerificarCorreo(medico $data)
    {
        try {
            $sql = "SELECT * FROM credenciales WHERE email=? AND id_medico != ?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->email,
                    $data->id
                )
            );

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            
        }
    }

    public function VerificarContraseña(medico $data)
    {
        try {
            $sql = "SELECT * FROM credenciales WHERE pass=? AND id_medico=?";

            $stm = $this->pdo->prepare($sql);
            $stm->execute(
                array(
                    $data->passold,
                    $data->id
                )
            );

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            
        }
    }

    public function ActualizarContraseña(medico $data){
        try{
            $sql = "UPDATE credenciales SET pass=? WHERE id_medico = ?";

            $this->pdo->prepare($sql)
            ->execute(array(
                $data->passnueva,
                $data->id
            ));

        }catch(Exception $e){
            
        }
    }
}
