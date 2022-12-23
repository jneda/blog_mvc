<?php

require_once './model/DBConnect.php';
require_once './model/classes/Comment.php';

class CommentManager
{
  public static function fetchCommentsByPostId($postId): array|bool
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM comment WHERE id_post=:postId ORDER BY date';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'postId' => $postId
    ]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Comment');
  }
}