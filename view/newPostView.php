<?php

require_once 'partials/header.php';

?>

<form class="container my-3" action="new-post.php" method="POST">
  <div class="mb-3 col-md-6 offset-md-3">
    <label for="title" class="form-label">Titre :</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group mb-3 col-md-6 offset-md-3">
    <label for="content">Contenu :</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>
  <div class="form-group mb-3 col-md-6 offset-md-3">
    <label for="image">Image :</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <button type="submit" class="btn btn-primary offset-md-3">Je publie !</button>
  <!-- <a href="signup.php" class="btn btn-outline-primary">S'inscrire</a> -->
</form>

<?php

require_once "partials/footer.php";
