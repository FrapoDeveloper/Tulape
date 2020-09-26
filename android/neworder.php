<?php 
include('../model/database_connect.php');
$id_usuario = "";
$id_proveedor = "";
$id_producto = "";
$precio_producto = 0;
$importe_total = 0;
$nombre_usuario = $_POST['nombre_usuario']; //pasarlo como preferencia 
$nombre_producto =  $_POST['nombre_producto']; //Inserta desde la app
$presentacion_producto =  $_POST['presentacion_producto'];
$cantidad_producto=  $_POST['cantidad_producto']; //desde la app
$tipo_pago =  $_POST['tipo_pago'];


$query_one ="SELECT id_usuario FROM usuario WHERE nombre_usuario=:nombre_usuario";
$statement1  = $conn->prepare($query_one);
$statement1->execute(array(
 ':nombre_usuario' => $nombre_usuario,
 ));
 while($row = $statement1->fetch()){
   $id_usuario = $row['id_usuario'];
 };

$id_usuario = intval($id_usuario);

$query_two = "SELECT id_proveedor FROM proveedor WHERE id_usuario_fk=:id_usuario";
$statement2  = $conn->prepare($query_two);
$statement2->execute(array(
  ':id_usuario' => $id_usuario,
 ));
 while($row2 = $statement2->fetch()){
   $id_proveedor = $row2['id_proveedor'];
 };


$query_three ="SELECT id_producto FROM producto WHERE nombre_producto = :nombre_producto
AND presentacion_producto=:presentacion_producto";
$statement3  = $conn->prepare($query_three);
$statement3->execute(array(
 ':nombre_producto' => $nombre_producto,
 ':presentacion_producto' => $presentacion_producto
 ));
 while($row = $statement3->fetch()){
   $id_producto = $row['id_producto'];
 };
$id_producto = intval($id_producto);

$query_four = "SELECT precio_producto FROM producto WHERE id_producto=:id_producto";
$statement4  = $conn->prepare($query_four);
$statement4->execute(array(
 ':id_producto' => $id_producto
 ));
 while($row = $statement4->fetch()){
   $precio_producto = $row['precio_producto'];
 };


$cantidad_producto = intval($cantidad_producto);
$precio_producto = floatval($precio_producto);
$importe_total = floatval($precio_producto * $cantidad_producto);

$query_five = "INSERT INTO venta VALUES(null,
:id_provider,:id_product,null,:number_product,:type_pay,:total_pay)";
    
  $statement5  = $conn->prepare($query_five);
  $statement5->execute(array(
    ':id_provider' => $id_proveedor,
    ':id_product' =>$id_producto,
    ':number_product' =>$cantidad_producto,
    ':type_pay' =>$tipo_pago,
    ':total_pay' => $importe_total
));

$resultado = $statement5->fetch();

if($resultado){
    echo "Venta registrada correctamente.";
}else{

}





?>