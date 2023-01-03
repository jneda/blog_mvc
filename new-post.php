<?php
session_start();

require_once './model/manager/CategoryManager.php';
require_once './model/manager/PostCategoryManager.php';
require_once './model/manager/ImageUploadManager.php';

$categories = CategoryManager::fetchAll();

if (!empty($_POST)) {
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

  // image upload
  if (!isset($_FILES['image'])) {
    $errorMessage = 'Données invalides';
    require_once './view/newPostView.php';
    die();
  }

  // var_dump($_FILES['image']);

  $imagePath = ImageUploadManager::uploadImage($_FILES['image']);
  // var_dump($imagePath);
  if (!$imagePath) {
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
    'image' => $imagePath
  ]);
  // var_dump($postId);

  if (!$postId) {
    $errorMessage = 'Échec de l\'enregistrement !';
  } else {
    $successMessage = 'Ton article a été sauvegardé pour la postérité !';
  }
  
  // save categories
  $categoryIds = [];

  // get selected categories
  foreach ($_POST['categories'] as $categoryId) {
    if (sanitizeInput($categoryId) === '') {
      continue;
    }
    $categoryIds[] = $categoryId;
  }

  // create and get new categories if needed
  if (!empty($_POST['new-categories'])) {
    $newCategories = explode(',', $_POST['new-categories']);
    foreach ($newCategories as $newCategory) {
      // sanitize and validate input
      $newCategory = sanitizeInput($newCategory);
      if (!isInputValid($newCategory)) {
        echo 'Invalid category name';
        continue;
      }
      // if category does not exist
      if (CategoryManager::getCategoryByName($newCategory)) {
        echo 'Category already exists';
        continue;
      }
      // create category
      $newCategoryId = CategoryManager::createCategory($newCategory);
      // push its ID into category ids array
      if ($newCategoryId) {
        array_push($categoryIds, $newCategoryId);
      }
    }
  }
  
  // save categories
  foreach ($categoryIds as $categoryId) {
    PostCategoryManager::createPostCategory($postId, $categoryId);
  }
}

require_once './view/newPostView.php';
