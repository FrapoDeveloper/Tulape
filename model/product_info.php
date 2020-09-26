<?php

include('database_connect.php');
      $mistakes = '';
      $foto_producto = $_FILES['foto_cerveza'];

      if(!empty($_POST['nombre_producto'])){
         $nombre_producto = $_POST['nombre_producto'];
         $nombre_producto = trim($nombre_producto);
         $nombre_producto = htmlspecialchars($nombre_producto);
         $nombre_producto = filter_var($nombre_producto,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar el nombre del proveedor. </br>';
      }

      if(!empty($_POST['descripcion_producto'])){
         $descripcion_producto = $_POST['descripcion_producto'];
         $descripcion_producto = trim($descripcion_producto);
         $descripcion_producto = htmlspecialchars($descripcion_producto);
         $descripcion_producto = filter_var($descripcion_producto,FILTER_SANITIZE_STRING);
    
      }else{
         $mistakes .= 'Ingresar el nombre de usuario. </br>';
      }
      
      
      if(!empty($_POST['presentacion_producto'])){
         $presentacion_producto = $_POST['presentacion_producto'];
         $presentacion_producto = trim($presentacion_producto);
         $presentacion_producto = htmlspecialchars($presentacion_producto);
         $presentacion_producto = filter_var($presentacion_producto,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar dirección del proveedor. </br>';
      }

      if(!empty($_POST['precio_producto'])){
         $precio_producto = $_POST['precio_producto'];
         $precio_producto = trim($precio_producto);
         $precio_producto = htmlspecialchars($precio_producto);
         $precio_producto = filter_var($precio_producto,FILTER_SANITIZE_STRING);
         $precio_producto = floatval($precio_producto);

      }else{
         $mistakes .= 'Ingresar teléfono del proveedor. </br>';
      }

if(empty($mistakes)){
      if($foto_producto['type'] == 'image/jpg' or $foto_producto['type'] == 'image/jpeg' 
      or $foto_producto['type'] == 'image/png'){
         $name_encry = md5($foto_producto['tmp_name']).".jpg";
         $ruta = "../resource/products_photo/".$name_encry;
         move_uploaded_file($foto_producto["tmp_name"],$ruta);
      }

      $query = "INSERT INTO producto VALUES(null,1,1,'$nombre_producto','$presentacion_producto',
      '$precio_producto','$descripcion_producto','$name_encry')";
        $statement = $conn->prepare($query);
        $resultado= $statement->execute();
        print_r($resultado);

 }else{
    echo $mistakes;
 }

?>