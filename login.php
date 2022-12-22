<?php

require_once 'model/DBConnect.php';

// $message = "Bienvenue sur cet article de blog !";

require_once 'view/loginView.php';

if (!empty($_POST)) {
  require_once 'lib/validation.php';
  $email = sanitizeInput($_POST['email']);
  $password = sanitizeInput($_POST['password']);
  if (!isInputValid($email) || !isInputValid($password)) {
    $errorMessage = 'Données invalides';
    require_once 'view/partials/errorAlert.php';
    die();
  }
  if (isInputValid($email) && isInputValid(($password))) {
    var_dump(['email' => $email, 'password' => $password]);
  }
}