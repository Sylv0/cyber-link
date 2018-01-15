<?php require __DIR__.'/views/header.php'; ?>


<div class="container">

        <form action="app/user/createUser.php" method="post">
          <h2 class="form-signin-heading">Please Register</h2>
          <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control" type="text" name="username" required>
              <small class="form-text text-muted">Please enter your desired username</small>
          </div><!-- /form-group -->

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

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </form>
</div>
<?php require __DIR__.'/views/footer.php'; ?>
