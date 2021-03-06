<?php require __DIR__.'/views/header.php'; ?>

<article>
  <h1>Login</h1>

  <form action="app/auth/login.php" method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" required>
      <small class="form-text text-muted">Please provide your email address.</small>
    </div><!-- /form-group -->

    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control" type="password" name="password" required>
      <small class="form-text text-muted">Please provide your password (passphrase).</small>
    </div><!-- /form-group -->

    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="./createUser.php">New around here? Sign up</a>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
