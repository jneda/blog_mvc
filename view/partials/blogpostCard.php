<div class="card blog-post" style="width: 18rem;">
  <img src="<?php echo $post->getImage() ?>" class="card-img-top" alt="<?php echo $post->getTitle() ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
    <p class="card-text"><?php echo $post->getContent() ?></p>
    <a href="#" class="btn btn-primary">J'adore !</a>
  </div>
</div>