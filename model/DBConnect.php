<?php

try {
  $databaseHandle = new PDO('mysql:host=localhost;dbname=tp_blog', 'root', '');
  $databaseHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}