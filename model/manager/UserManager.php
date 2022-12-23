<?php

require_once './model/classes/User.php';
require_once './model/DBConnect.php';

class UserManager
{
  /**
   * Read static methods
   */

  public static function getUserById(int $idUser): User|bool
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM user WHERE id_user=:idUser';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'idUser' => $idUser
    ]);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    return $statement->fetch();
  }

  public static function getUserByName(string $username): User|bool
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM user WHERE username=:username';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'username' => $username
    ]);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    return $statement->fetch();
  }

  public static function getUserByEmail(string $email): User|bool
  {
    $databaseHandle = dbConnect();
    $query = 'SELECT * FROM user WHERE email=:email';
    $statement = $databaseHandle->prepare($query);
    $statement->execute([
      'email' => $email
    ]);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
    return $statement->fetch();
  }

  /**
   * Write static methods
   */

  public static function registerUser(array $userData): bool
  {
    $databaseHandle = dbConnect();
    $query = '
      INSERT INTO user (username, email, password)
      VALUES (:username, :email, :password)
    ';
    $statement = $databaseHandle->prepare($query);
    return $statement->execute([
      'username' => $userData['username'],
      'email' => $userData['email'],
      'password' => $userData['password']
    ]);
  }
}
