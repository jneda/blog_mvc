  <?php
  foreach ($commentsData as $commentData) {
    ['comment' => $comment, 'author' => $commentAuthor] = $commentData;
    require './view/partials/commentCard.php';
  }
  ?>