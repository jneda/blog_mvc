<div class="card blog-post col-md-6 offset-md-3">
  <img src="<?php echo $post->getImage() ?>" class="card-img-top" alt="<?php echo $post->getTitle() ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
    <p class="card-text"><?php echo $post->getContent() ?></p>
    <a href="index.php" class="btn btn-primary">Je retourne lire d'autres articles !</a>
  </div>
</div>