<?php

require_once 'partials/header.php';
require_once './view/partials/navbar.php';

?>
<div class="container my-3">
  <form action="new-post.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 col-md-8 offset-md-2">
      <label for="title" class="form-label">Titre :</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group mb-3 col-md-8 offset-md-2">
      <label for="content" class="mb-2">Contenu :</label>
      <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <div class="form-group mb-3 col-md-8 offset-md-2">
      <label for="image" class="d-block mb-2">Image :</label>
      <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group mb-3 col-md-8 offset-md-2">
      <label for="categories" class="d-block mb-2">Catégories :</label>
      <select class="form-control" multiple aria-label="Catégories" id="categories" name="categories[]">
        <option selected></option>
        <?php foreach ($categories as $category) { ?>
          <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="mb-3 col-md-8 offset-md-2">
      <label for="new-categories" class="form-label">Nouvelles catégories :</label>
      <input type="text" class="form-control" id="new-categories" name="new-categories">
      <div id="new-categories-help" class="form-text">Entrer de nouvelles catégories séparées par une virgule</div>
    </div>
    <button type="submit" class="btn btn-primary offset-md-2">Je publie !</button>
    <!-- <a href="signup.php" class="btn btn-outline-primary">S'inscrire</a> -->
  </form>

  <?php

  if (isset($errorMessage)) {
    require_once './view/partials/errorAlert.php';
  } else if (isset($successMessage)) {
    require_once './view/partials/successAlert.php';
  }

  ?>

</div>

<?php

require_once "partials/footer.php";
