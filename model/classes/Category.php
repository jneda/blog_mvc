<?php

final class Category
{
  private int $id_category;
  private string $category_name;

  /**
   * Getters
   */

  public function getId(): int
  {
    return $this->id_category;
  }

  public function getName(): string
  {
    return $this->category_name;
  }

  /**
   * Setters
   */

  public function setName(string $newName): void
  {
    $this->category_name = $newName;
  }
}
