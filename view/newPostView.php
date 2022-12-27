<?php

require_once 'partials/header.php';

?>
<div class="container my-3">
  <form action="new-post.php" method="POST">
    <div class="mb-3 col-md-6 offset-md-3">
      <label for="title" class="form-label">Titre :</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group mb-3 col-md-6 offset-md-3">
      <label for="content" class="mb-2">Contenu :</label>
      <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <div class="form-group mb-3 col-md-6 offset-md-3">
      <label for="image" class="d-block mb-2">Image :</label>
      <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group mb-3 col-md-6 offset-md-3">
      <label for="categories" class="d-block mb-2">Catégories :</label>
      <select class="form-control" multiple aria-label="Catégories" id="categories" name="categories[]">
        <option selected></option>
        <?php foreach ($categories as $category) { ?>
          <option value="<?= $category->getName() ?>"><?= $category->getName() ?></option>
        <?php } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary offset-md-3">Je publie !</button>
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
