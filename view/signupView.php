<?php

require_once 'partials/header.php';
require_once './view/partials/navbar.php';

?>

<form class="container my-3" action="signup.php" method="POST">
  <div class="mb-3 col-md-6 offset-md-3">
    <label for="username" class="form-label">Ton pseudo :</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="mb-3 col-md-6 offset-md-3">
    <label for="email" class="form-label">Ton email :</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3 col-md-6 offset-md-3">
    <label for="password" class="form-label">Ton mot de passe :</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary offset-md-3">S'inscrire</button>
</form>

<?php

require_once "partials/footer.php";
