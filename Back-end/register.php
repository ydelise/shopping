<?php
require('./db.php');
 
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
    var_dump($email);
    var_dump($password);
 
    $q = $connexion->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
    $q->bindValue('email', $email);
    $q->bindValue('password', $password);
    $res = $q->execute();
       var_dump($res);
       
    if ($res) {
        echo "Inscription réussie";
    }
}
?>