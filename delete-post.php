<?php

session_start();

require_once './lib/validation.php';
require_once './model/manager/CommentManager.php';
require_once './model/manager/ImageUploadManager.php';
require_once './model/manager/PostManager.php';
require_once './model/manager/PostCategoryManager.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: index.php');
  die();
}

// validate GET input
$idPost = sanitizeInput($_GET['id']);
if (!isInputValid($idPost)) {
  header('Location: index.php');
  die();
}

// if post exists
$post = PostManager::getPostById($idPost);
$userIsAuthor = isset($_SESSION['user']['id']) && $_SESSION['user']['id'] === $post->getIdAuthor();

if (!$post || !$userIsAuthor) {
  // redirect and die
  header('Location: index.php');
  die();
}

// check if categories depend on it
$dependingCategories = PostCategoryManager::fetchCategoriesFromPostId($idPost);
// if so, delete relevant entries from post_category table
if ($dependingCategories) {
  foreach ($dependingCategories as $postCategory) {
    PostCategoryManager::deletePostCategory($idPost, $postCategory->getId());
  }
}

// check if comments depend on it
$dependingComments = CommentManager::fetchCommentsByPostId($idPost);
// if so, delete them
if ($dependingComments) {
  foreach($dependingComments as $comment) {
    CommentManager::deleteComment($comment->getCommentId());
  }
}

// delete image
ImageUploadManager::deleteImage($post->getImage());

// delete it
if ($post) {
  PostManager::deletePost($post->getIdPost());
}

// redirect
header('Location: index.php');
