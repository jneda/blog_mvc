<?php

require_once './model/classes/User.php';
require_once './model/DBConnect.php';

class UserManager
{
  public static function getUserById(int $idUser): User
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

  public static function getUserByName(string $username): User
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

  public static function getUserByEmail(string $email): User | bool
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
}
