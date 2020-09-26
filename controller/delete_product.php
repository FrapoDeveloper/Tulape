<?php
 include('../model/database_connect.php');
if(isset($_POST['id_product_f'])){

$id_usuario = '';
$id_product_b = $_POST['id_product_f'];

$query_one = "DELETE  FROM venta WHERE id_producto_fk=:id_product_b";
$statement1  = $conn->prepare($query_one);
$statement1->execute(array(
':id_product_b' => $id_product_b
));

$query_two ="DELETE  FROM producto WHERE  id_producto = :id_product_b";
    $statement2  = $conn->prepare($query_two);
    $statement2->execute(array(
    ':id_product_b' => $id_product_b
    ));

}


 
 
 ?>