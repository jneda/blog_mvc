<?php
session_start();

require_once './model/manager/UserManager.php';
require_once './view/signupView.php';

if (!empty($_POST)) {
  // validate inputs

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
    $_SESSION['error'] = $errorMessage;
    header('Location: signup.php');
    die();
  }

  // check if username or email are already registered
  $usernameUsed = UserManager::getUserByName($username);
  $emailUsed = UserManager::getUserByEmail($email);

  if ($usernameUsed || $emailUsed) {
    // build error message
    $errorMessages = [];
    if ($usernameUsed) {
      $errorMessages[] = 'Ce nom est déjà utilisé';
    }
    if ($emailUsed) {
      $errorMessages[] = 'Cet email est déjà utilisé';
    }
    $errorMessage = implode(' - ', $errorMessages);
    $_SESSION['error'] = $errorMessage;
    header('Location: signup.php');
    die();
  }

  // hash password
  $hash = password_hash($password, PASSWORD_BCRYPT);

  // create user in database

  $ok = UserManager::registerUser([
    'username' => $username,
    'email' => $email,
    'password' => $hash
  ]);

  // user feedback

  if (!$ok) {
    $errorMessage = 'Échec de l\'inscription ! 🤔';
    $_SESSION['error'] = $errorMessage;
    header('Location: signup.php');
    die();
  }

  // update session
  $id = (UserManager::getUserByEmail($email))->getUserId();
  $_SESSION['user'] = [
    'id' => $id,
    'name' => $username
  ];

  // redirect
  header('Location: index.php?login=success');
}
