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
$commentsData = [];

$comments = CommentManager::fetchCommentsByPostId($postId);

if ($comments) {
  foreach ($comments as $comment) {
    $comment->setDate($comment->getFormattedDate());
    $commentAuthor = UserManager::getUserById($comment->getAuthorId());

    // make a plain PHP object from the User object, only storing the username and email
    $authorObject = (object) [
      'username' => $commentAuthor->getUsername(),
      'email' => $commentAuthor->getEmail()
    ];

    $commentsData[] = [
      'comment' => $comment,
      'author' => $authorObject
    ];
  }
}

echo json_encode($commentsData);
