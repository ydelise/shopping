 <?php  
 session_start();
 require  './dbname.php';
  if(isset($_POST['envoi'])){
       if(!empty($_POST['email'])  && !empty($_POST['password'])){
           $email = htmlspecialchars($_POST['email']);
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

         var_dump($email, $password);

         $insert = $connexion->prepare('INSERT INTO users(email, password) VALUES (:email, :password)');
         $insert->bindValue('email', $email);
         $insert->bindValue('password', $password);
         $res = $insert->execute();
           var_dump($res);
           
          if($res){
           // echo 'inscription reussi';
            header("Location: connexion.php");
         }
       }else{

         echo 'veueillez remplir tous les champs';
       }
  }
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <style>

 </style>
 <body>
  <div class="form">         
 <form action="" method="POST" style="text-align: center;">
 <h4>inscription</h4>
    <input type="email" name="email" placeholder="entrez votre email"><br>
    <input type="password" name="password" placeholder="votre mot de passe"><br>
    <button value="submit" name="envoi">inscription</button>
    
 </form>
 </div>

 <footer>
  <div class="footer-">        
 <p2><i class="fa fa-copyright" aria-hidden="true"></i>2024</p2>
  <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
  </div>
 </footer> 
 </body>
 </html>
  