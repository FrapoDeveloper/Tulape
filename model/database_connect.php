<?php 
$server = 'localhost';
$username = 'id14945823_frapo';
$password = 'D#!v\)3||al8@_?V';
$database = 'id14945823_tulape';
try{
    $conn = new PDO("mysql:host=$server;dbname=$database",$username,$password);
}catch(PDOException $e){
    echo "Failed connect database: ".$e->getMessage();
}

?>