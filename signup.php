<?php

require_once './model/manager/UserManager.php';

// $message = "Bienvenue sur cet article de blog !";

require_once './view/signupView.php';

if (!empty($_POST)) {
  require_once './lib/validation.php';
  $username = sanitizeInput($_POST['username']);
  $email = sanitizeInput($_POST['email']);
  $password = sanitizeInput($_POST['password']);

  if (
    !isInputValid($username) ||
    !isInputValid($email) ||
    !isInputValid($password)
  ) {
    $errorMessage = 'Données invalides';
    require_once './view/partials/errorAlert.php';
    die();
  }

  $ok = UserManager::registerUser([
    'username' => $username,
    'email' => $email,
    'password' => $password
  ]);

  if (!$ok) {
    $errorMessage = 'Échec de l\'inscription ! 🤔';
    require_once './view/partials/errorAlert.php';
    die();
  }

  $successMessage = sprintf('Bienvenue à toi, %s ! 🥳', $username);
  require_once './view/partials/successAlert.php';
}
