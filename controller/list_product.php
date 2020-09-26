
<?php 
include('../model/database_connect.php');
$mistakes = '';
$query = "SELECT id_producto,foto_producto,nombre_producto,descripcion_producto,
precio_producto  FROM producto";
$statement = $conn->prepare($query);
$resultado = $statement->execute();
$json = array();
while($row = $statement->fetch()){
    $json[] = array(
        'key_product_b' => $row['id_producto'],
        'photo_product_b' => $row['foto_producto'],
        'nombre_producto_b' => $row['nombre_producto'],
        'descripcion_producto_b' => $row['descripcion_producto'],
        'precio_producto_b'=>$row['precio_producto']

    );
}
$jsonString = json_encode($json);
echo $jsonString;





?>