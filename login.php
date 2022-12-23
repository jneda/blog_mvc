<?php

require_once './model/manager/UserManager.php';
require_once './view/loginView.php';

if (!empty($_POST)) {
  // validate inputs

  require_once './lib/validation.php';
  $email = sanitizeInput($_POST['email']);
  $password = sanitizeInput($_POST['password']);

  if (!isInputValid($email) || !isInputValid($password)) {
    $errorMessage = 'Données invalides';
    require_once './view/partials/errorAlert.php';
    die();
  }

  // fetch user

  $user = UserManager::getUserByEmail($email);

  if (!$user) {
    $errorMessage = 'Ton email est inconnu ! 🤔';
    require_once './view/partials/errorAlert.php';
    die();
  }

  // check password
  if (!password_verify($password, $user->getPassword())) {
    $errorMessage = 'Mot de passe erroné ! 🤔';
    require_once './view/partials/errorAlert.php';
    die();
  }

  $successMessage = sprintf('Salut à toi, %s ! 🥳', $user->getUsername());
  require_once './view/partials/successAlert.php';
}
