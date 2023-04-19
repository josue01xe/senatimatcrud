<?php

require_once 'Conexion.php';

class Colaborador extends Conexion{

  private $accesoBD;

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  public function listarColaboradores(){
  
    try{
      //1.-Preparamos la consulta
      $consulta = $this->accesoBD->prepare("CALL spu_colaboradores_listar()");
      //2.-Ejecutamos la consulta
      $consulta->execute();
      //3.-Devolvemos el resultado(array asociativo)
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function registrarColaborador($datos = []) {
    try {
        $consulta = $this->accesoBD->prepare("CALL spu_colaboradores_registrar(?,?,?,?,?,?,?,?)");
        $consulta->execute([
            $datos['apellidos'],
            $datos['nombres'],
            $datos['idcargo'],
            $datos['idsede'],
            $datos['telefono'],
            $datos['tipocontrato'],
            $datos['cv'],
            $datos['direccion']
        ]);
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
  
}




