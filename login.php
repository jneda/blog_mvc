<?php
session_start();

require_once './model/manager/UserManager.php';
require_once './view/loginView.php';

if (!empty($_POST)) {
  // validate inputs

  require_once './lib/validation.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (!isInputValid($email) || !isInputValid($password)) {
    $errorMessage = 'Données invalides';
  }

  // fetch user

  $user = UserManager::getUserByEmail($email);

  if (!$user) {
    $errorMessage = 'Ton email est inconnu ! 🤔';
    $_SESSION['error'] = $errorMessage;
    header('Location: login.php');
    die();
  }

  // check password
  if (!password_verify($password, $user->getPassword())) {
    $errorMessage = 'Mot de passe erroné ! 🤔';
    $_SESSION['error'] = $errorMessage;
    header('Location: login.php');
    die();
  }

  // abort if error occurred
  if (isset($errorMessage) && !empty($errorMessage)) {
    $_SESSION['error'] = $errorMessage;
    header('Location: login.php');
    die();
  }

  // update session
  $username = (UserManager::getUserByEmail($email))->getUsername();
  $_SESSION['user'] = [
    'id' => $user->getUserId(),
    'name' => $username
  ];

  // redirect
  header('Location: index.php?login=success');
}
