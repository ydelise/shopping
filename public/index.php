 <?php  
   $bd = new PDO("mysql:host=localhost;dbname=barre", 'root', '');
   $allusers = $bd->query('SELECT * FROM users ORDER BY id DESC');
      if(isset($_GET['s']) && !empty($_GET['s'])){
        $rechercher = htmlspecialchars($_GET['s']);
        $allusers = $bd->query('SELECT pseudo FROM users WHERE pseudo LIKE "%'.$rechercher.'%"ORDER BY id DESC');
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
      <input type=" search" name="s" placeholder="rechercher utilisateur" autocomplete="off">
      <input type="submit" name="envoyer">

    </form>
    <sectio class="root">
        <?php  
           if($allusers->rowCount() > 0){
                while($user=$allusers->fetch()){
                    ?>
                    <p><?=$user['pseudo']; ?></p>
                    <?php
                }
           }else{
            ?>  
            <p>Aucun utilisateur trouvé</p>
            <?php
           }
        ?>
    </sectio>
 </body>
 </html>