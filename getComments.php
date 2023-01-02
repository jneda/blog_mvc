<?php

require_once './lib/validation.php';
require_once './model/manager/CommentManager.php';
require_once './model/manager/UserManager.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  die();
}

$postId = sanitizeInput($_GET['id']);
if (!isInputValid($postId)) {
  die();
}

// fetch comments data
$comments = CommentManager::fetchCommentsByPostId($postId);
// var_dump($comments);
if ($comments) {
  $commentsData = [];
  foreach ($comments as $comment) {
    $commentAuthor = UserManager::getUserById($comment->getAuthorId());
    $commentAuthor->setPassword('');
    $commentsData[] = [
      'comment' => $comment,
      'author' => $commentAuthor
    ];
  }
  // var_dump($commentsData);
  /* 
  foreach ($commentsData as $commentData) {
    foreach ($commentData as $key => $dataObject) {
      echo json_encode($dataObject);
    }
  }
 */

  // CORS
  
  // header('Access-Control-Allow-Origin: http://localhost:8080');
  // header('Access-Control-Allow-Credentials: true');

  echo json_encode($commentsData);
}
