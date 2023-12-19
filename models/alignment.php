<?php

require_once '../models/conexion.php';


class Alignment extends Conexion {
  private $pdo;
  public function __construct()
  {
    $this->pdo=parent::getConexion();
  }
   public function resumenalignment(){
    try
    {
      $consulta=$this->pdo->prepare("CALL spu_resumen_alignment()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e)
    {
        die($e->getMessage());
    }
   }
   public function listar(){
    try
    {
       $consulta=$this->pdo->prepare("CALL spu_resumen_alignment()");
       $consulta->execute();
       return $consulta->fetchAll(PDO::FETCH_ASSOC);
       
    }catch(Exception $e)
    { 
      die($e->getMessage());
    }
   }
}