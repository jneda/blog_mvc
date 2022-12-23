<div class="card comment my-3">
  <!-- <img src="<?php echo $post->getImage() ?>" class="card-img-top" alt="<?php echo $post->getTitle() ?>"> -->
  <div class="card-body">
    <p class="comment-author">
      par <strong><?= $commentAuthor->getUsername() ?></strong> 
      <span class="text-muted">- <?= $comment->getFormattedDate() ?></span>
    </p>
    <p class="card-text"><?php echo $comment->getContent() ?></p>
  </div>
</div>