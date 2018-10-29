
<?php 
include './includes/header.php';
include './includes/navbar.php';
require('./includes/conbdd.php');
?>

<div class="header">
<h3 class="tit">INSCRIPTIONS</h3>
</div>

<?php 
if(isset($_GET['error'])){
  if(isset($_GET['pass'])){
    echo'<p id="error"> Les mots de passe ne sont pas identiques.</p>';
  }
  if(isset($_GET['email'])){
    echo'<p id="error"> Cet email est déjà pris.</p>';
  }
}
?>
<div class="container">
  <div id="form">
  <form method="POST" action="inscriptions.php">

  <table>
    <tr>
    <td>Votre pseudo :</td>
    <td><input type="text" name="pseudo" placeholder="pseudo" required></td>
    </tr>
    <tr>
    <td>Votre Email : </td>
    <td><input type="email" name="email" placeholder="email@test.fr" required></td>
    </tr>
    <tr>
    <td>Votre mot de passe : </td>
    <td><input type="password" name="password" placeholder="*****" required></td>
    </tr>
    <tr>
    <td>Confirmez votre mot de passe :</td>
    <td><input type="password" name="password_confirm" placeholder="*****" required></td>
    </tr>
  </table>
<div id="button">
<button>Inscription</button>
</div>
  </form>
</div>
  </div>

  <?php
if(!empty($_POST['pseudo'])   && !empty($_POST['email'])  && !empty($_POST['password']) && !empty($_POST['password_confirm'])){
 


  $pseudo = $_POST['pseudo'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];

  if($password != $password_confirm){
    header('location: inscriptions.php?error=1&pass=1');
    return();

    $req = $db->prepare("SELECT count(*) as numberEmail FROM membres WHERE email = ?");
    $req -> execute(array($email));

    while($email_verification = $req ->fetch()){
      if($email_verification['numberEmail']!= 0){
        header('location: inscriptions.php?error=1&email=1' );
        return();
      }
    }
  }

}

$secret = sha1($email).time();
$secret = sha1($secret).time().time();

$password = "aq1".sha1($password. "1254")."25";


$req = $db -> prepare("INSERT INTO membres(pseudo, email, mdp, cle) VALUES(?, ?, ?, ?)");
$req -> excecute(array($pseudo, $email, $password, $secret));

header('location: inscriptions.php?/success=1' );
return();

?>

  
    