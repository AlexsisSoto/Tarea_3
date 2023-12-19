<?php


require_once '../models/alignment.php';

if(isset($_GET['operacion'])){
   $alignment = new Alignment();
   if($_GET['operacion']=='resumenalignment'){
   
    echo json_encode($alignment->resumenalignment());

   }
   if($_GET['operacion']=='listar'){
       $alignment= new Alignment();
       $resultado=$alignment->listar();
       echo json_encode($resultado);
   }
}