<!--footer.php-->
require('./dbname.php');
 
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    var_dump($email);
    var_dump($password);
 
    $q = $connexion->prepare('SELECT * FROM users WHERE email = :email');
    $q->bindValue('email', $email);
    $q->execute();
    $res = $q->fetch(PDO::FETCH_ASSOC);
    
    var_dump($res);
    
    if ($res) {
        $passwordHash = $res['password'];
        if (password_verify($password, $passwordHash)) {
           // echo "Connexion réussie !";
            header('Location: index.php');
        } else {
            echo "Identifiants invalides";
        }
    } else {
        echo "Identifiants invalides";
    }
}