<?php 
include('../model/database_connect.php');

$query = "SELECT fecha_venta, id_venta,nombre_proveedor,nombre_producto,presentacion_producto,
cantidad_productos, importe_venta, tipo_pago FROM venta INNER JOIN proveedor
ON venta.id_proveedor_fk = proveedor.id_proveedor
INNER JOIN producto ON venta.id_producto_fk = producto.id_producto ORDER BY fecha_venta DESC";

$statement = $conn->prepare($query);
$resultado= $statement->execute();
$json = array();

while($row = $statement->fetch()){
    $json[] = array(
    'key_client_b' => $row['id_venta'],
    'fecha_venta' => $row['fecha_venta'],
    'nombre_proveedor' => $row['nombre_proveedor'],
    'nombre_producto'=> $row['nombre_producto'],
    'presentacion_producto'=> $row['presentacion_producto'],
    'cantidad_producto'=> $row['cantidad_productos'],
    'importe_venta'=> $row['importe_venta'],
    'tipo_pago' => $row['tipo_pago']
    );
}

$jsonString = json_encode($json);
echo $jsonString;

?>