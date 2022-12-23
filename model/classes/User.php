<?php

class User
{
  private int $id_user;
  private string $username;
  private string $email;
  private string $password;

  /**
   * Getters
   */

  public function getUserId(): int
  {
    return $this->id_user;
  }

  public function getUsername(): string
  {
    return $this->username;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Setters
   */

  public function setUserId(int $id): void
  {
    $this->id_user = $id;
  }

  public function setUsername(string $username): void
  {
    $this->username = $username;
  }

  public function setEamail(string $email): void
  {
    $this->email = $email;
  }

  public function setPassword(string $password): void
  {
    $this->password = $password;
  }
}