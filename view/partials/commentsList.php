<div class="my-3 col-md-6 offset-md-3">
  <?php
  foreach ($commentsData as $commentData) {
    ['comment' => $comment, 'author' => $commentAuthor] = $commentData;
    require './view/partials/commentCard.php';
  }
  ?>
</div>