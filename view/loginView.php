<?php

require_once 'partials/header.php';
require_once 'partials/navbar.php';

?>

<form class="container my-3" action="login.php" method="POST">
  <div class="mb-3 col-md-6 offset-md-3">
    <label for="email" class="form-label">Ton email :</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3 col-md-6 offset-md-3">
    <label for="password" class="form-label">Ton mot de passe :</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary offset-md-3">Se connecter</button>
  <a href="signup.php" class="btn btn-outline-primary">S'inscrire</a>
</form>

<?php

require_once "partials/footer.php";
