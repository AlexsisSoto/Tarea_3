<?php



require_once '../models/publisher.php';

if(isset($_GET['operacion'])){
  $publisher= new Publisher();
  if($_GET['operacion']=='listarpublisher'){
    $resultado=$publisher->listarpublisher();
    echo json_encode($resultado);
  }
}