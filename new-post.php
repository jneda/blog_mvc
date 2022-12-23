<?php
session_start();

require_once 'view/newPostView.php';

if (!empty($_POST)) {
  // validate inputs

  require_once './lib/validation.php';
  $title = sanitizeInput($_POST['title']);
  $content = sanitizeInput($_POST['content']);
  $image = sanitizeInput($_POST['image']);

  if (
    !isInputValid($title) ||
    !isInputValid($content) ||
    !isInputValid($image)
  ) {
    $errorMessage = 'Données invalides';
    require_once './view/partials/errorAlert.php';
    die();
  }

  // create post in database
  require_once './model/manager/PostManager.php';
  $ok = PostManager::createPost([
    'title' => $title,
    'content' => $content,
    'idAuthor' => $_SESSION['user']['id'], 
    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Cute_dog.jpg/640px-Cute_dog.jpg'
  ]);

  if (!$ok) {
    $errorMessage = 'Échec de l\'enregistrement !';
    require_once './view/partials/errorAlert.php';
    die();
  } else {
    $successMessage = 'Ton article a été sauvegardé pour la postérité !';
    require_once './view/partials/successAlert.php';
  }
}