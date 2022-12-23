<form class="container my-3" action="comment.php?id=<?= $idPost ?>" method="POST">
  <div class="form-group mb-3 col-md-6 offset-md-3">
    <label for="content">Ton super commentaire :</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary offset-md-3">Je publie !</button>
  <!-- <a href="signup.php" class="btn btn-outline-primary">S'inscrire</a> -->
</form>