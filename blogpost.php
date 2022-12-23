<?php
session_start();

require_once './lib/validation.php';
require_once './model/manager/PostManager.php';
require_once './model/manager/UserManager.php';

$errorMessage = null;
$post = null;

if (empty($_GET)) {
  $errorMessage = 'Adresse invalide !';
} else {
  $postId = sanitizeInput($_GET['id']);

  if (!isInputValid($postId)) {
    $errorMessage = 'Adresse invalide !';
  } else {
    $post = PostManager::getPostById($postId);
    if (!$post) {
      header('Location: index.php');
    }
    $author = UserManager::getUserById($post->getIdAuthor());
  }
}


require_once 'view/blogpostView.php';
