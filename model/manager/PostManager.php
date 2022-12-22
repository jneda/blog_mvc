<?php

require_once './model/DBConnect.php';
require_once './model/classes/Post.php';

class PostManager
{
  public static function fetchAllPosts(): array
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM post';
    $statement = $databaseHandle->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Post');
  }
}
