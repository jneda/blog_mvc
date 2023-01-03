<?php

require_once './view/partials/header.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: index.php');
  die();
}

$postId =$_GET['id'];

?>

<div class="container my-3 col-lg-6 offset-lg-3">
  <button class="btn btn-primary" type="button" data-post-id="<?= $postId ?>" id="ajax-comments">Chope les commentaires !</button>
</div>
<script src="./js/ajax-comments.js" defer></script>

<?php

require_once "./view/partials/footer.php";
