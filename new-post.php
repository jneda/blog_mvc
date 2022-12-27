<?php
session_start();

require_once './model/manager/CategoryManager.php';
require_once './model/manager/PostCategoryManager.php';

$categories = CategoryManager::fetchAll();

if (!empty($_POST)) {

  var_dump($_POST);

  // validate inputs

  require_once './lib/validation.php';
  $title = sanitizeInput($_POST['title']);
  $content = sanitizeInput($_POST['content']);
  // $image = sanitizeInput($_POST['image']);

  if (
    !isInputValid($title) ||
    !isInputValid($content) //||
    // !isInputValid($image)
  ) {
    $errorMessage = 'Données invalides';
    require_once './view/newPostView.php';
    die();
  }

  // create post in database
  require_once './model/manager/PostManager.php';
  $postId = PostManager::createPost([
    'title' => $title,
    'content' => $content,
    'idAuthor' => $_SESSION['user']['id'],
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Cute_dog.jpg/640px-Cute_dog.jpg'
  ]);
  var_dump($postId);

  if (!$postId) {
    $errorMessage = 'Échec de l\'enregistrement !';
  } else {
    $successMessage = 'Ton article a été sauvegardé pour la postérité !';
  }
  
  // save categories
  foreach ($_POST['categories'] as $categoryId) {
    if (sanitizeInput($categoryId) === '') {
      continue;
    }
    PostCategoryManager::createPostCategory($postId, $categoryId);
  }

}

require_once './view/newPostView.php';
