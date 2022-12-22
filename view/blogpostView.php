<?php

require_once 'partials/header.php';

if (!isset($errorMessage)) {
  // var_dump($post);
  require_once 'partials/blogpost.php';
} else {
  require './view/partials/errorAlert.php';
}

require_once "partials/footer.php";
