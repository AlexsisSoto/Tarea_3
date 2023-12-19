<?php

require_once '../models/conexion.php';

class Publisher extends Conexion{
     private $pdo;
     public function __construct()
     {
     $this->pdo=parent::getConexion();
     }
     public function listarpublisher(){
      try
      {
           $consulta=$this->pdo->prepare("CALL sp_publisher_listar()");
           $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage());
      }

     }
     public function Buscarpublisherhero($data=[])
     {
          try{
            $consulta=$this->pdo->prepare("CALL spu_publisher_buscar(?)");
            $consulta->execute(
            array($data['_publisher_id' ]));

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
          }catch(Exception $e)
          {
           die($e->getMessage());
          }
     }
     
}


?>