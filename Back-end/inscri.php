<?php  
 require 'dbname.php' ;
if(isset($_POST['envoi'])){
if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
       $pseudo = htmlspecialchars($_POST['pseudo']);
      $mdp = sha1($_POST['mdp']);
      var_dump($pseudo, $mdp);

       $insert = $con->prepare('INSERT INTO user(pseudo, mdp)VALUES(?, ?)');
       $insert->execute(array($pseudo, $mdp));
      
       $recup = $con->prepare('SELECT * FROM user WHERE pseudo = ? AND mdp = ?');
       $recup->execute(array($pseudo, $mdp));
       if($recup->rowCount() > 0){
        
       $_SESSION['pseudo']= $pseudo;
       $_SESSION['mdp'] = $mdp;
       $_SESSION['id'] = $recup->fetch()['id'];
       }
          echo $_SESSION['id'];
  }else{
    echo 'veuillez remplir ce formulaire';
    }
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
    
<form action="" method="POST" style="text-align: center;">
        <input type="text" name="pseudo"  autocomplete="off"><br>
        <input type="password"  name="mdp"><br>
        <button value="submit" name="envoi">envoyer</button>
    </form>
</body>
</html>