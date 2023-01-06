<div class="row">
  <!-- categories -->
  <div class="col-lg-8 offset-lg-2">
    <p class="fs-5 mt-3">
      <?php foreach ($categories as $category) { ?>
        <a href="category.php?id=<?= $category->getId() ?>" class="badge bg-secondary me-auto p-2 my-1" style="text-decoration: none;"><?= $category->getName() ?></a>
      <?php } ?>
    </p>
  </div>
</div>

<div class="row my-3" id="post" data-post-id="<?= $post->getIdPost() ?>">
  <div class="col-lg-8 offset-lg-2">

    <!-- post content -->
    <div class="my-3">
      <h1><?php echo $post->getTitle() ?></h1>
      <p>
        par
        <strong>
          <a href="user.php?id=<?= $author->getUserId() ?>">
            <?= $author->getUsername() ?>
          </a>
        </strong>
        <span class="text-muted">- <?= $post->getFormattedDate() ?></span>
      </p>
      <!-- post image -->
      <img src="uploads/<?php echo $post->getImage() ?>" class="img-fluid rounded w-100 d-block mx-auto" alt="<?php echo $post->getTitle() ?>">
      <p style="white-space: pre-wrap;"><?= $post->getContent() ?></p>
    </div>

    <!-- author actions -->
    <?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] === $post->getIdAuthor()) { ?>
      <div class="row">
          <a href="edit-post.php?id=<?= $post->getIdPost() ?>" class="btn btn-outline-primary my-1">
            Modifier cet article
          </a>
          <a href="delete-post.php?id=<?= $post->getIdPost() ?>" class="btn btn-danger my-1">
            Supprimer cet article
          </a>
      </div>
    <?php } ?>

    <!-- user actions -->
    <div class="row">
        <a href="index.php" class="btn btn-outline-primary my-1">
          &laquo; Je retourne lire d'autres articles !
        </a>
      <?php if (!isset($_SESSION['user']['id'])) { ?>
          <a href="login.php" class="btn btn-primary my-1">
            Quel super article ! Je me connecte pour commenter !
          </a>
      <?php } else {
        require_once './view/commentView.php';
      } ?>
    </div>

    <div id="comment-container"></div>
  </div>
</div>