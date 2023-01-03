<?php
$userConnected = isset($_SESSION['user']) && !empty($_SESSION['user']['id']);
if (isset($_GET['logout']) && $_GET['logout'] === 'success') {
  $logoutAlert = true;
}
if (isset($_GET['login']) && $_GET['login'] === 'success') {
  $loginAlert = true;
  $username = $_SESSION['user']['name'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog | Anthony Houlala</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <span class="mb-0">Bonjour tout le monde ! 🥸</span>
        <small class="text-muted"> Un blog d'Anthony Houlala</small>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <?php if (!$userConnected) { ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Se connecter</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="new-post.php">Écrire un super article !</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Se déconnecter</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  if (isset($logoutAlert)) {
    $successMessage = 'Tu es déconnecté. 👋';
    require_once './view/partials/successAlert.php';
  } else if (isset($loginAlert)) {
    $successMessage = sprintf('Salut à toi, <b>%s</b> 🥳', $username);
    require_once './view/partials/successAlert.php';
  }
  ?>