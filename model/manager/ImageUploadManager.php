<?php

final class ImageUploadManager
{
  const ALLOWED_EXTENSIONS = [
    'jpg', 'jpeg', 'gif', 'png'
  ];

  const UPLOADS_FOLDER = 'uploads/';

  public static function uploadImage(array $userFile): string|bool
  {
    $uniqueName = uniqid() . '-' . $userFile['name'];
    $targetFile =self::UPLOADS_FOLDER . $uniqueName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // validate file
    if (!getimagesize($userFile['tmp_name'])) {
      return false;
    }

    if (!in_array($fileType, self::ALLOWED_EXTENSIONS)) {
      return false;
    }

    if (file_exists($targetFile)) {
      return false;
    }

    // try and save file
    if (move_uploaded_file($userFile['tmp_name'], $targetFile)) {
      return $uniqueName;
    }
    return false;
  }

  public static function deleteImage($fileName)
  {
    unlink(self::UPLOADS_FOLDER . $fileName);
  }
} 