
<?php 
// Dimensiones de la foto del chofer: 626 x 417

   include('database_connect.php');
      $mistakes = '';
      $foto_proveedor = $_FILES['foto_proveedor'];

      if(!empty($_POST['nombre_proveedor'])){
         $nombre_proveedor = $_POST['nombre_proveedor'];
         $nombre_proveedor = trim($nombre_proveedor);
         $nombre_proveedor = htmlspecialchars($nombre_proveedor);
         $nombre_proveedor = filter_var($nombre_proveedor,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar el nombre del proveedor. </br>';
      }

      if(!empty($_POST['nombre_usuario'])){
         $nombre_usuario = $_POST['nombre_usuario'];
         $nombre_usuario = trim($nombre_usuario);
         $nombre_usuario = htmlspecialchars($nombre_usuario);
         $nombre_usuario = filter_var($nombre_usuario,FILTER_SANITIZE_STRING);
         $pass_usuario = $nombre_usuario . '2020';
         $nombre_usuario = $nombre_usuario . '@tulape.pe';
        
      }else{
         $mistakes .= 'Ingresar el nombre de usuario. </br>';
      }
      
      
      if(!empty($_POST['direccion_proveedor'])){
         $direccion_proveedor = $_POST['direccion_proveedor'];
         $direccion_proveedor = trim($direccion_proveedor);
         $direccion_proveedor = htmlspecialchars($direccion_proveedor);
         $direccion_proveedor = filter_var($direccion_proveedor,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar dirección del proveedor. </br>';
      }

      if(!empty($_POST['telefono_proveedor'])){
         $telefono_proveedor = $_POST['telefono_proveedor'];
         $telefono_proveedor = trim($telefono_proveedor);
         $telefono_proveedor = htmlspecialchars($telefono_proveedor);
         $telefono_proveedor = filter_var($telefono_proveedor,FILTER_SANITIZE_STRING);
      

      }else{
         $mistakes .= 'Ingresar teléfono del proveedor. </br>';
      }

      if(!empty($_POST['dni_proveedor'])){
         $dni_proveedor = $_POST['dni_proveedor'];
         $dni_proveedor = trim($dni_proveedor);
         $dni_proveedor = htmlspecialchars($dni_proveedor);
         $dni_proveedor = filter_var($dni_proveedor,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar número telefónico. </br>';
      }

if(empty($mistakes)){
      if($foto_proveedor['type'] == 'image/jpg' or $foto_proveedor['type'] == 'image/jpeg' 
      or $foto_proveedor['type'] == 'image/png'){
         $name_encry = md5($foto_proveedor['tmp_name']).".jpg";
         $ruta = "../resource/drivers_photo/".$name_encry;
         move_uploaded_file($foto_proveedor["tmp_name"],$ruta);
      }
      $query_one = "INSERT INTO usuario(id_usuario,nombre_usuario,clave_usuario,puntos_usuario) 
      VALUES(null,:nombre_usuario,:pass_usuario,0)";
      $statement  = $conn->prepare($query_one);
      $statement->execute(array(
      ':nombre_usuario' => $nombre_usuario,
      ':pass_usuario' =>$pass_usuario
      ));
      $result= $statement->fetch();
 
      $query_two ="SELECT id_usuario FROM usuario WHERE nombre_usuario=:name_user";
      $statement1  = $conn->prepare($query_two);
      $statement1->execute(array(
       ':name_user' => $nombre_usuario,
       ));
       
       while($row = $statement1->fetch()){
         $id_usuario = $row['id_usuario'];
       };

      $query ="INSERT INTO proveedor(id_proveedor,id_usuario_fk,nombre_proveedor,direccion_proveedor,telefono_proveedor,dni_proveedor,foto_proveedor)
      VALUES(null,'$id_usuario','$nombre_proveedor','$direccion_proveedor','$telefono_proveedor','$dni_proveedor','$name_encry')";
      $statement3 = $conn->prepare($query);
      $resultado3= $statement3->execute();
      
}else{
   echo $mistakes;
}
  


?>