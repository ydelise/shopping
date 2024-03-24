<?php 
$bdd = new PDO("mysql:host=localhost;dbname=barre", 'root', '');
$allusers = $bdd->query('SELECT * FROM users ORDER BY id DESC');

  if(isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('SELECT pseudo FROM users WHERE pseudo LIKE "%' .$recherche.'%"ORDER BY id DESC ');
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
    <input type="search" name="s" placeholder="rechercher un utilisateur">
    <input type="submit" name="envoyer">

    </form>
    <section class="afficher_utilisateur">
        <?php 
          if($allusers->rowCount() > 0){
           while($user=$allusers->fetch()){
            ?>
            <p><?= $user['pseudo']; ?></p>
            <?php
           }
           
          }else{
            ?>
            <p>Aucun atilisateur trouvé</p>
            <?php
          }
        ?>
    </section>
</body>
</html>