<?php
 include('../model/database_connect.php');
if(isset($_POST['id_driver_f'])){

$id_usuario = '';
$id_driver_b = $_POST['id_driver_f'];

$query_one ="SELECT id_usuario_fk FROM proveedor WHERE  id_proveedor = :id_driver";
    $statement1  = $conn->prepare($query_one);
    $statement1->execute(array(
    ':id_driver' => $id_driver_b
    ));

 while($row = $statement1->fetch()){
   $id_usuario = $row['id_usuario_fk'];
 };
$id_usuario = intval($id_usuario); 

    $querytwo = "DELETE FROM proveedor WHERE id_proveedor = :id_driver";
    $statement2  = $conn->prepare($querytwo);
    $statement2->execute(array(
    ':id_driver' => $id_driver_b
    ));

    $querythree = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
    $statement3  = $conn->prepare($querythree);
    $statement3->execute(array(
    ':id_usuario' => $id_usuario
    ));

if(!$statement){
    die("Query Failed");
}

echo "Tarea borrada correctamente.";

}


 
 
 ?>