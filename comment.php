<?php
session_start();

require_once './lib/validation.php';
require_once './model/manager/CommentManager.php';

// var_dump($_POST);

if (isset($_POST['content'])) {

  // validate POST input
  $content = sanitizeInput($_POST['content']);
  $idPost = sanitizeInput($_POST['idPost']);
  if (!isInputValid($content) || !isInputValid($idPost)) {
    header('Location: index.php');
    die();
  }

  // validate user id
  if (!isset($_SESSION['user']) || empty($_SESSION['user']['id'])) {
    header('Location: index.php');
    die();
  }

  // create comment in database
  $ok = CommentManager::createComment([
    'idPost' => $idPost,
    'idAuthor' => $_SESSION['user']['id'],
    'content' => $content
  ]);
}

// display views

require_once './view/partials/header.php';
require_once './view/partials/navbar.php';
require_once './view/commentView.php';
require_once './view/partials/footer.php';