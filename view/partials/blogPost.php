<div class="container my-3">
  <div class="blog-post col-md-6 offset-md-3">
    <img src="<?php echo $post->getImage() ?>" class="blog-post-img img-fluid rounded" alt="<?php echo $post->getTitle() ?>">
    <div class="blog-post-body my-3">
      <h1 class="blog-post-title fs-2"><?php echo $post->getTitle() ?></h5>
      <p class="blog-post-text fs-5"><?php echo $post->getContent() ?></p>
    </div>
    <a href="index.php" class="btn btn-primary">Je retourne lire d'autres articles !</a>
  </div>
</div>