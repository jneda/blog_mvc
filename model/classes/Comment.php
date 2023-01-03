<?php

class Comment implements JsonSerializable
{
  private int $id_comment;
  private int $id_post;
  private int $id_author;
  private string $date;
  private string $content;

  /**
   * Getters
   */

  public function getCommentId(): int
  {
    return $this->id_comment;
  }

  public function getPostId(): int
  {
    return $this->id_post;
  }

  public function getAuthorId(): int
  {
    return $this->id_author;
  }

  public function getDate(): string
  {
    return $this->date;
  }

  public function getFormattedDate(): string
  {
    $fmt = new IntlDateFormatter(
      'fr_FR',
      IntlDateFormatter::MEDIUM,
      IntlDateFormatter::MEDIUM,
      'Europe/Paris',
      IntlDateFormatter::GREGORIAN
    );

    return $fmt->format(new DateTime($this->date));
  }

  public function getContent(): string
  {
    return $this->content;
  }

  /**
   * Setters
   */

  public function setDate(string $newDate): void
  {
    $this->date = $newDate;
  }

  /**
   * JsonSerializable implementation
   */

  public function jsonSerialize(): mixed
  {
    return get_object_vars($this);
  }
}
