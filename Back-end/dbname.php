<?php 
try{
    $con= new PDO("mysql:host=localhost;dbname=test;charset=utf8;", "root", '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "404" .$e->getMessage();
} 

?>
