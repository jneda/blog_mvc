<?php

require_once './model/DBConnect.php';
require_once './model/classes/Category.php';

final class CategoryManager
{
  /**
   * Read static methods
   */

  public static function fetchAll(): array
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM category';
    $statement = $databaseHandle->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Category');
  }

  public static function getCategoryById(int $id): Category|bool
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM category WHERE id_category=:id';
    $statement = $databaseHandle->prepare($query);
    $statement->execute(['id' => $id]);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'Category');
    return $statement->fetch();
  }

  public static function getCategoryByName(string $name): Category|bool
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM category WHERE category_name=:name';
    $statement = $databaseHandle->prepare($query);
    $statement->execute(['name' => $name]);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'Category');
    return $statement->fetch();
  }

  /**
   * Create static methods
   */

  /**
   * Save new category into database
   *
   * @param string $categoryName
   * @return integer ID of new category
   */
  public static function createCategory(string $categoryName): int
  {
    $databaseHandle = dbConnect();
    $query = '
      INSERT INTO category (category_name)
      VALUES (:categoryName)
    ';
    $statement = $databaseHandle->prepare($query);
    if ($statement->execute(['categoryName' => $categoryName])) {
      return $databaseHandle->lastInsertId();
    }
  }
}
