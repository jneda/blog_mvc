<?php

session_start();

require_once './lib/validation.php';
require_once './model/manager/CategoryManager.php';
require_once './model/manager/PostManager.php';

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

$category = CategoryManager::getCategoryById($id);
if (!$category) {
  header('Location: index.php');
  die();
}

$posts = PostManager::fetchAllPostsFromCategoryId($category->getId());

// var_dump($posts);

require_once './view/categoryView.php';
