<?php
session_start();

require_once './model/manager/CategoryManager.php';
require_once './model/manager/PostManager.php';
require_once './model/manager/PostCategoryManager.php';
require_once './model/manager/ImageUploadManager.php';

$userUnset = !isset($_SESSION['user']) || empty($_SESSION['user']['id']);
$postIdUnset = !isset($_GET['id']) || empty($_GET['id']);

if ($userUnset || $postIdUnset || !$userIsAuthor) {
  header('Location: index.php');
  die();
}

$userId = $_SESSION['user']['id'];
$postId = $_GET['id'];

$post = PostManager::getPostById($postId);
$userIsAuthor = isset($_SESSION['user']['id']) && $_SESSION['user']['id'] === $post->getUserId();

if (!$post || !$userIsAuthor) {
  header('Location: index.php');
  die();
}

$postCategories = PostCategoryManager::fetchCategoriesFromPostId($postId);
$postCategoryIds = [];
foreach ($postCategories as $postCategory) {
  $postCategoryIds[] = $postCategory->getId();
}

$categories = CategoryManager::fetchAll();

if (!empty($_POST)) {
  // validate inputs

  require_once './lib/validation.php';
  $title = sanitizeInput($_POST['title']);
  $content = sanitizeInput($_POST['content']);

  if (
    !isInputValid($title) ||
    !isInputValid($content)
  ) {
    $errorMessage = 'Données invalides';
    require_once './view/editPostView.php';
    die();
  }

  // image upload
  if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
    $imagePath = ImageUploadManager::uploadImage($_FILES['image']);
    if (!$imagePath) {
      $errorMessage = 'Fichier invalide';
      require_once './view/editPostView.php';
      die();
    }
    // delete old file
    ImageUploadManager::deleteImage($post->getImage());
    // update post image
    $post->setImage($imagePath);
  }

  // update post data
  // TODO: make PostManager play nice with Post constructor then rewrite this
  $post->setTitle($title);
  $post->setContent($content);  

  // update post in database
  $updateStatus = PostManager::updatePost($post);

  if (!$updateStatus) {
    $errorMessage = 'Échec de l\'enregistrement !';
  } else {
    $successMessage = 'Ton article a été sauvegardé pour la postérité !';
  }

  // save categories
  $categoryIds = [];

  // get selected categories not already saved for this post
  foreach ($_POST['categories'] as $categoryId) {
    if (sanitizeInput($categoryId) === '') {
      continue;
    }
    if (!in_array($categoryId, $postCategoryIds)) {
      $categoryIds[] = $categoryId;
    }
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

require_once './view/editPostView.php';
