<div class="card blog-post col-md-6 offset-md-3 my-3">
  <!-- <img src="<?php echo $post->getImage() ?>" class="card-img-top" alt="<?php echo $post->getTitle() ?>"> -->
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
    <!-- <p class="card-text"><?php echo $post->getContent() ?></p> -->
    <a href="blogPost.php?id=<?= $post->getIdPost() ?>" class="btn btn-primary">Je veux lire la suite !</a>
  </div>
</div>