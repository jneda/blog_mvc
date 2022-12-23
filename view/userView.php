<?php

require_once './view/partials/header.php';

?>

<div class="container my-3 col-md-6 offset-md-3">
  <h1>Articles écrits par <?= $user->getUsername() ?> :</h1>
  <?php require_once './view/partials/blogPostsList.php'; ?>
  <a href="index.php" class="btn btn-outline-primary">&laquo; Je retourne à l'accueil !</a>
</div>


<?php

require_once './view/partials/footer.php';
