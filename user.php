<?php

session_start();

require_once './lib/validation.php';
require_once './model/manager/PostManager.php';
require_once './model/manager/UserManager.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: index.php');
  die();
}

// validate id
$id = sanitizeInput($_GET['id']);
if (!isInputValid($id)) {
  header('Location: index.php');
  die();
}

$user = UserManager::getUserById($id);
if (!$user) {
  header('Location: index.php');
  die();
}

$posts = PostManager::fetchAllPostsFromUserId($user->getUserId());

require_once './view/userView.php';
