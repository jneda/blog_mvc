<form class="row my-3" action="comment.php?id=<?= $postId ?>" method="POST">
  <div class="form-group mb-3 col-lg-8 offset-lg-2">
    <label for="content" class="my-2">Ton super commentaire :</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>
  <div class="col-lg-8 offset-lg-2">
    <button type="button" id="post-comment-btn" data-post-id="<?= $postId ?>" data-user-id="<?= $_SESSION['user']['id'] ?>" class="btn btn-primary">Je publie !</button>
  </div>
</form>