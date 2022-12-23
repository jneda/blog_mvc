<?php

require_once './model/DBConnect.php';
require_once './model/classes/Post.php';

class PostManager
{
  /**
   * Read static methods
   */

  public static function fetchAllPosts(): array
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM post';
    $statement = $databaseHandle->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Post');
  }

  public static function getPostById(int $idPost): Post
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM post WHERE id_post=:idPost';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'idPost' => $idPost
    ]);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'Post');
    return $statement->fetch();
  }

  /**
   * Create static methods
   */

  public static function createPost(array $postData): bool
  {
    $databaseHandle = dbConnect();
    $query = '
      INSERT INTO post (title, content, date, id_author, image)
      VALUES (:title, :content, :date, :id_author, :image)
    ';
    $statement = $databaseHandle->prepare($query);

    return $statement->execute([
      'title' => $postData['title'],
      'content' => $postData['content'],
      'date' => (new DateTime())->format('Y-m-d H:i:s'),
      'id_author' => $postData['idAuthor'],
      'image' => $postData['image']
    ]);
  }
}
