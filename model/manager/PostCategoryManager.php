<?php

require_once './model/DBConnect.php';
require_once './model/classes/Post.php';
require_once './model/classes/Category.php';

final class PostCategoryManager
{
  /**
   * Read static methods
   */

  function fetchCategoriesFromPostId(int $postId): array
  {
    $databaseHandle = dbConnect();
    $query = '
      SELECT id_category, category_name FROM post_category AS p_c
      INNER JOIN category AS c ON p_c.id_category=c.id_category
      WHERE p_c.id_post=:postId
    ';
    $statement = $databaseHandle->prepare($query);
    $statement->execute(['postId' => $postId]);
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Category');
  }
}
