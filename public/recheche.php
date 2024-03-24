<?php

$connexion = new PDO("mysql:host=localhost;dbname=barre", 'root', '');
$allusers = $connexion->query('SELECT * FROM users ORDER BY id DESC'); 

if(isset($_GET['s']) AND !empty($_GET['s'])){
$rech= htmlspecialchars($_GET['s']);
$allusers= $connexion->query('SELECT pseudo FROM users WHERE pseudo LIKE "%' .$rech. '%" ORDER BY id DESC');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
        <input type="search" name="s" placeholder="rechercher">
        <input type="submit" name="envoyer">
    </form>
    <section class="afficher_users">
        <?php 
       if($allusers->rowCount() > 0){
             while($user = $allusers->fetch()){
              ?>
              <p><?= $user['pseudo']; ?></p>
              <?php
             }
       }else{
        ?>
        <p>aucun utilisateur trouvé</p>
        <?php
       }
     ?>
    </section>
</body>
</html>