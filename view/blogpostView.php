<?php

require_once './view/partials/header.php';

if (!isset($errorMessage)) {
  // var_dump($post);
  require_once './view/partials/blogpost.php';
  if (isset($commentsData)) {
    // var_dump($commentsData);
    require_once './view/partials/commentsList.php';
  }
} else {
  require './view/partials/errorAlert.php';
}

require_once "./view/partials/footer.php";
