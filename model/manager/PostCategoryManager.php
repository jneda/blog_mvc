<?php

require_once './model/DBConnect.php';
require_once './model/classes/Post.php';
require_once './model/classes/Category.php';

final class PostCategoryManager
{
  /**
   * Read static methods
   */

  public static function fetchCategoriesFromPostId(int $postId): array
  {
    $databaseHandle = dbConnect();
    $query = '
      SELECT c.id_category, category_name FROM post_category AS p_c
      INNER JOIN category AS c ON p_c.id_category=c.id_category
      WHERE p_c.id_post=:postId
    ';
    $statement = $databaseHandle->prepare($query);
    $statement->execute(['postId' => $postId]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Category');
  }

  /**
   * Create static methods
   */

  public static function createPostCategory(int $postId, int $categoryId): void
  {
    $databaseHandle = dbConnect();
    $query = '
      INSERT INTO post_category (id_post, id_category)
      VALUES (:postId, :categoryId)
    ';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'postId' => $postId,
      'categoryId' => $categoryId
    ]);
  }

  /**
   * Delete static method
   */

  public static function deletePostCategory(int $postId, int $categoryId)
  {
    $databaseHandle = dbConnect();
    $query = '
      DELETE FROM post_category
      WHERE id_post=:postId AND id_category=:categoryId
    ';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'postId' => $postId,
      'categoryId' => $categoryId
    ]);
  }
}
