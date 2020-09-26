<?php 
include('../model/database_connect.php');

$b_user = $_POST['usuario'];
$b_password = $_POST['clave'];

$b_user = filter_var($b_user,FILTER_SANITIZE_STRING);
$b_user = filter_var($b_user,FILTER_SANITIZE_EMAIL);
$b_user = htmlspecialchars($b_user);
$b_user = trim($b_user);

$b_password = filter_var($b_password,FILTER_SANITIZE_STRING);
$b_password = htmlspecialchars($b_password);
$b_password = trim($b_password);

        $query = "SELECT *FROM usuario WHERE nombre_usuario = :user
        AND clave_usuario = :pass";
        $statement  = $conn->prepare($query);
        $statement->execute(array(
            ':user' => $b_user,
            ':pass' => $b_password
        ));
        $result = $statement->fetch();
        if($result){
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }else{
        }
?>