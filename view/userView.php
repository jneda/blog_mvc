<?php

require_once './view/partials/header.php';
require_once './view/partials/navbar.php';

?>

<div class="container my-3 col-lg-6 offset-lg-3">
  <h1>Articles écrits par <?= $user->getUsername() ?> :</h1>
  <div class="d-flex flex-wrap justify-content-center">
    <?php require_once './view/partials/blogPostsList.php'; ?>
  </div>
  <a href="index.php" class="btn btn-outline-primary my-3">&laquo; Je retourne à l'accueil !</a>
</div>


<?php

require_once './view/partials/footer.php';
