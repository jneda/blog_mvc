<div class="col-md-6 mb-3">
  <div class="card my-3 shadow-sm h-100">
    <img src="uploads/<?php echo $post->getImage() ?>" class="card-img-top" alt="<?php echo $post->getTitle() ?>" style="max-height: 10rem; object-fit: cover;">
    <div class="card-body d-flex flex-column justify-content-between">
      <h2 class="card-title my-3"><?php echo $post->getTitle() ?></h2>
      <a  href="blogpost.php?id=<?= $post->getIdPost() ?>" class="btn btn-primary mt-3 ms-auto">Je veux lire la suite !</a>
    </div>
  </div>
</div>