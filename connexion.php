<?php 
include 'includes/header.php';
include 'includes/navbar.php';

?>
<div class="header">
<h3 class="tit">CONNEXION</h3>
</div>

<div class="container">
  <div id="form">
  <form method="POST" action="inscriptions.php">

  <table>
  
    <tr>
    <td>Votre Email : </td>
    <td><input type="email" name="email" placeholder="email@test.fr"></td>
    </tr>
    <tr>
    <td>Votre mot de passe : </td>
    <td><input type="password" name="password" placeholder="*****"></td>
    </tr>
    <tr>
   
</table>
<div id="button">
<button>Connexion</button>
</div>
  </form>
</div>
  </div>