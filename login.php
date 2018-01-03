<?php require __DIR__.'/views/header.php'; ?>

<article>

  <div class="container">
        <form class="form-signin" method="POST">
          <h2 class="form-signin-heading">Please Register</h2>
          <div class="input-group">
  	  <span class="input-group-addon" id="basic-addon1"></span>
  	  <input type="text" name="username" class="form-control" placeholder="Username" required>
  	</div>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
          <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
        </form>
  </div>

<?php require __DIR__.'/views/footer.php'; ?>
