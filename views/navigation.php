<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav float-left">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Home</a>
      </li><!-- /nav-item -->

      <li class="nav-item">
        <a class="nav-link" href="./about.php">About</a>
      </li><!-- /nav-item -->
    </ul>

    <ul class ="navbar-nav float-right">
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
          <a class="nav-link" href="./profile.php">Profile</a>
        </li>
        <!--
        <div class="dropdown">
          <button class="dropbtn" onclick="dropDown()">
            <?php echo $_SESSION['userId'] ?>
          </button>
          <div class="dropdown-content" id="myDropdown">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
          </div>
        </div>-->
      <?php } ?>
    </ul>
  </div>
</nav><!-- /navbar -->
