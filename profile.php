<?php require __DIR__.'/views/header.php'; ?>
<?php
if (isset($_SESSION['userId'])) {
  $statement = $pdo->prepare('SELECT * FROM user WHERE userId = :id');
  $statement ->bindParam(':id', $_SESSION['userId']);

  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);
  $name= $user['name'];
  $email = $user['email'];
  $bio = $user['bio'];
  $pic = $user['profile_image'];
  ?>
  <div class="card profile">
    <img class="card-img-top" src="<?php echo $pic ?>">
    <div class="card-body">
      <ul>
        <li>Username: <?php echo $name ?></li>
        <li>Email: <?php echo $email ?></li>
        <li>Biography: <?php echo $bio ?></li>
      </ul>
      <a class="btn btn-primary" href="./updateProfile.php">Edit Profile</a>
      <a class="btn btn-danger" href="app/user/deleteUser.php">Delete User</a>

    </div>
  </div>

  <?php
  $userPosts = $pdo->prepare('SELECT * FROM posts WHERE userId= :id ORDER BY postID');
  $userPosts ->bindParam(':id',$_SESSION['userId']);
  $userPosts ->execute();

  foreach ($userPosts as $post){ ?>

    <div class="card posts">
      <div class="card-body">
        <h3>  <?php echo $post['title']; ?></h3>
        <p><?php echo $post['content']; ?> </p>
        <p><?php echo $post['post_date']; ?> </p>
        <a class="btn btn-primary edit" href="./editPost.php?postid=<?php echo $post['postid']?>" role="button">Edit post</a>
        <a class="btn btn-danger delete" href="app/posts/delete.php?postid=<?php echo $post['postid']?>" role="button">Delete post</a>
      </div>
    </div>
    <?php
  }
} else {
  echo "Please log in first to see this page."; ?>
  <a class="btn" href="./login.php">Login</a>

<?php } require __DIR__.'/views/footer.php'; ?>
