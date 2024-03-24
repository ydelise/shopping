<?php  
session_start();


if(isset($_POST['submit'])){      
if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
$pseudo = htmlspecialchars($_POST['pseudo']);
$mdp = sha1( $_POST['mdp']);


$req= $con->prepare('INSERT INTO user(pseudo, mdp)VALUES(?, ?)');
$req->execute(array($pseudo, $mdp));

}else{
    echo "veuillez remplir les champs";
}
}
?>
