
<?php 
include('../model/database_connect.php');
$mistakes = '';
$query = "SELECT id_proveedor,foto_proveedor,nombre_proveedor,direccion_proveedor,
telefono_proveedor,dni_proveedor FROM proveedor";
$statement = $conn->prepare($query);
$resultado = $statement->execute();
$json = array();
while($row = $statement->fetch()){
    $json[] = array(
        'key_product_b' => $row['id_proveedor'],
        'photo__driver_b' => $row['foto_proveedor'],
        'enrollment_driver_b' => $row['nombre_proveedor'],
        'name_driver_b' => $row['direccion_proveedor'],
        'dni_driver_b'=>$row['dni_proveedor'],
        'phone_driver_b'=> $row['telefono_proveedor']

    );
}
$jsonString = json_encode($json);
echo $jsonString;





?>