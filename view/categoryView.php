<?php

require_once './view/partials/header.php';

?>

<div class="container my-3 col-lg-6 offset-lg-3">
  <h1>Articles pour la catégorie <?= $category->getName() ?> :</h1>
  <?php require_once './view/partials/blogPostsList.php'; ?>
  <a href="index.php" class="btn btn-outline-primary my-3">&laquo; Je retourne à l'accueil !</a>
</div>


<?php

require_once './view/partials/footer.php';
