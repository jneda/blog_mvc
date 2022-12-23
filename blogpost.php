<?php
session_start();

require_once './lib/validation.php';
require_once './model/manager/CommentManager.php';
require_once './model/manager/PostManager.php';
require_once './model/manager/UserManager.php';

$errorMessage = null;
$post = null;

if (empty($_GET)) {
  $errorMessage = 'Adresse invalide !';
} else {
  // validate input
  $postId = sanitizeInput($_GET['id']);

  if (!isInputValid($postId)) {
    $errorMessage = 'Adresse invalide !';
  } else {

    // fetch post
    $post = PostManager::getPostById($postId);
    if (!$post) {
      header('Location: index.php');
    }

    // fetch post author
    $author = UserManager::getUserById($post->getIdAuthor());
    
    // fetch comments data
    $comments = CommentManager::fetchCommentsByPostId($postId);
    if ($comments) {
      $commentsData = [];
      foreach($comments as $comment) {
        $commentAuthor = UserManager::getUserById($comment->getAuthorId());
        $commentsData[] = [
          'comment' => $comment,
          'author' => $commentAuthor
        ];
      }
    }
  }
}


require_once 'view/blogpostView.php';
