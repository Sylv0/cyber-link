<?php
require __DIR__.'/views/header.php';

$statement = $pdo->prepare('SELECT * FROM user WHERE userId = :name');
$statement ->bindParam(':name', $_SESSION['userId']);

$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

$name= $user['name'];
$email = $user['email'];
$bio = $user['bio'];

?>
<div class="container">

        <form action="app/user/updateProfile.php" method="post">
          <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control" type="text" name="username" value="<?php echo $name?>">
              <small class="form-text text-muted">Please enter your desired username</small>
          </div><!-- /form-group -->

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" value="<?php echo $email?>">
                <small class="form-text text-muted">Please provide your email address.</small>
            </div><!-- /form-group -->

            <div class="form-group">
                <label for="password">Old Password</label>
                <input class="form-control" type="password" name="Oldpassword">
                <small class="form-text text-muted">Please provide your old password.</small>
            </div><!-- /form-group -->
            <div class="form-group">
                <label for="password">New Password</label>
                <input class="form-control" type="password" name="Newpassword">
                <small class="form-text text-muted">Please provide your new password.</small>
            </div><!-- /form-group -->
            <div class="form-group">
                <label for="password">Repeat new Password</label>
                <input class="form-control" type="password" name="Repeatpassword">
                <small class="form-text text-muted">Please provide your password.</small>
            </div><!-- /form-group -->

            <div class="form-group">
                <label for="bio">Bio</label>
                <input class="form-control" type="text" name="bio" value="<?php echo $bio?>">

            </div><!-- /form-group -->

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </form>
</div>
<?php require __DIR__.'/views/footer.php'; ?>
