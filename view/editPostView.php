<?php

require_once 'partials/header.php';

?>
<div class="container my-3">
  <form action="" method="POST" enctype="multipart/form-data">
    <h1>Modifier l'article</h1>
    <div class="mb-3 col-md-8 offset-md-2">
      <label for="title" class="form-label">Titre :</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= $post->getTitle() ?>">
    </div>
    <div class="form-group mb-3 col-md-8 offset-md-2">
      <label for="content" class="mb-2">Contenu :</label>
      <textarea class="form-control" id="content" name="content" rows="3"><?= $post->getContent() ?></textarea>
    </div>
    <div class="form-group mb-3 col-md-8 offset-md-2">
      <label for="image" class="d-block mb-2">Modifier l'image :</label>
      <input type="file" class="form-control-file" id="image" name="image" value=""></span>
    </div>
    <div class="form-group mb-3 col-md-8 offset-md-2">
      <label for="categories" class="d-block mb-2">Catégories :</label>
      <select class="form-control" multiple aria-label="Catégories" id="categories" name="categories[]">
        <option></option>
        <?php foreach ($categories as $category) {
          $selected = in_array($category->getId(), $postCategoryIds) ?>
          <option value="<?= $category->getId() ?>"<?= $selected ? ' selected' : '' ?>><?= $category->getName() ?></option>
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
