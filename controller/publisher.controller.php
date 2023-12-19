<?php



require_once '../models/publisher.php';

if (isset($_GET['operacion'])) {
  $publisher = new Publisher();
  if ($_GET['operacion'] == 'listarpublisher') {
    $resultado = $publisher->listarpublisher();
    echo json_encode($resultado);
  }
  if ($_GET['operacion'] == 'buscar') {
    $res = $publisher->Buscarpublisherhero(["_publisher_id" => $_GET["_publisher_id"]]);
    echo json_encode($res);
  }
}
/*$res=new Publisher();
$co=$res->Buscarpublisherhero(["_publisher_id"=>2]);
echo json_encode($co);
*/
