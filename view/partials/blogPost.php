<div class="container my-3">
  <div class="blog-post col-md-6 offset-md-3">
    <img src="<?php echo $post->getImage() ?>"
    class="blog-post-img img-fluid rounded"
    alt="<?php echo $post->getTitle() ?>">
    <div class="blog-post-body my-3">
      <h1 class="blog-post-title fs-2"><?php echo $post->getTitle() ?></h5>
        <p class="blog-post-author">
          par
          <strong>
            <a href="user.php?id=<?= $author->getUserId() ?>">
              <?= $author->getUsername() ?>
            </a>
          </strong>
          <span class="text-muted">- <?= $post->getFormattedDate() ?></span>
        </p>
        <p class="blog-post-text fs-4"><?php echo $post->getContent() ?></p>
    </div>
    <a href="index.php" class="btn btn-outline-primary my-1">
      &laquo; Je retourne lire d'autres articles !
    </a>
    <?php if (isset($_SESSION['user']['id'])) { ?>
    <a href="comment.php?id=<?= $post->getIdPost() ?>"
      class="btn btn-primary my-1">
      Quel super article ! Je commente !
    </a>
    <?php } else { ?>
      <a href="login.php"
      class="btn btn-primary my-1">
      Quel super article ! Je me connecte pour commenter !
    </a>  
    <?php } ?>
  </div>
</div>