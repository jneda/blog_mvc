<?php

require_once './model/DBConnect.php';
require_once './model/classes/Comment.php';

class CommentManager
{
  /**
   * Read static methods
   */

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

  /**
   * Create static methods
   */

  public static function createComment(array $commentData): bool
  {
    $databaseHandle = dbConnect();
    $query = '
      INSERT INTO comment (id_post, id_author, date, content)
      VALUES (:idPost, :idAuthor, :date, :content)
    ';
    $statement = $databaseHandle->prepare($query);
    return $statement->execute([
      'idPost' => $commentData['idPost'],
      'idAuthor' => $commentData['idAuthor'],
      'date' => (new DateTime())->format('Y-m-d H:i:s'),
      'content' => $commentData['content']
    ]);
  }

  /**
   * Delete static method
   */

  public static function deleteComment(int $commentId)
  {
    $databaseHandle = dbConnect();
    $query = 'DELETE FROM comment WHERE id_comment=:commentId';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'commentId' => $commentId
    ]);
  }
}
