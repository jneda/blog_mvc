<?php

require_once './view/partials/header.php';

?>

<script src="./js/ajax-comments.js" defer></script>

<?php

require_once './view/partials/navbar.php';

if (!isset($errorMessage)) {
?>

<div class="container my-3" id="post-container">

<?php

  require_once './view/partials/blogPost.php';
  if (isset($commentsData)) {
    require_once './view/partials/commentsList.php';
  }
} else {
  require './view/partials/errorAlert.php';
}

?>

</div>

<?php

require_once "./view/partials/footer.php";
