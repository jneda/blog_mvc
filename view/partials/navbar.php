</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <span class="mb-0">Bonjour tout le monde ! 🥸</span>
        <small class="text-muted d-none d-md-inline"> Un blog d'Anthony Houlala</small>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
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
  