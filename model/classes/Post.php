<?php
/**
 * Blog post
 */
class Post
{
  private int $id_post;
  private string $title;
  private string $content;
  private string $date;
  private int $id_author;
  private string $image;

  public function __construct(
    int $id_post,
    string $title,
    string $content,
    string $date,   
    int $id_author,
    string $image
  )
  {
    $this->id_post = $id_post;
    $this->title = $title;
    $this->content = $content;
    $this->date = $date; 
    $this->id_author = $id_author;
    $this->image = $image;
  }

  /**
   * Getters
   */

  public function getIdPost(): int
  {
    return $this->id_post;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getContent(): string
  {
    return $this->content;
  }

  public function getDate(): string
  {
    return $this->date;
  }

  public function getIdAuthor(): int
  {
    return $this->id_author;
  }

  public function getImage(): string
  {
    return $this->image;
  }

  /**
   * Setters
   */

  public function setTitle(string $title)
  {
    $this->title = $title;
  }

  public function setContent(string $content)
  {
    $this->content = $content;
  }

  public function setDate(string $date)
  {
    $this->date = $date;
  }

  public function setIdAuthor(int $idAuthor)
  {
    $this->id_author = $idAuthor;
  }
  
  public function setImage(string $image)
  {
    $this->image = $image;
  }
}
