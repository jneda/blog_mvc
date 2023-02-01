<?php

function dbConnect(): PDO
{
  try {
    $databaseHandle = new PDO('mysql:host=localhost;dbname=tp_blog', 'root', '');
    $databaseHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $databaseHandle;
  } catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
  }
}
