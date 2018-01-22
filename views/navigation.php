<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>
  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span></button>

  <div class="collapse navbar-collapse" id="collapsibleNavId">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Home</a>
      </li><!-- /nav-item -->

      <li class="nav-item">
        <a class="nav-link" href="./about.php">About</a>
      </li><!-- /nav-item -->
    </ul>

    <ul class ="navbar-nav ml-auto justify-content-end">
      <?php if (!isset($_SESSION['userId'])){ ?>

        <li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./createUser.php">Sign up</a>
        </li><!-- /nav-item -->

      <?php } else { ?>

        <li class="nav-item">
          <a class="nav-link" href="app/auth/logout.php">Log out</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./createPost.php">Create Posts</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./profile.php">Profile</a>
        </li>

      <?php } ?>
    </ul>
  </div>
</nav>
