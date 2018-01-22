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
  <div class = "profile-picture">
    <?php if(empty($pic)) $image = "default.png"; ?>
    <img class="picture" src="<?php echo $pic ?>">
  </div>
  <ul>
    <li>Username: <?php echo $name ?></li>
    <li>Email: <?php echo $email ?></li>
    <li>Biography: <?php echo $bio ?></li>
  </ul>
  <a class="btn" href="./updateProfile.php">Edit Profile</a>
</div>

<?php
$userPosts = $pdo->prepare('SELECT * FROM posts WHERE userId= :id ORDER BY postID');
$userPosts ->bindParam(':id',$_SESSION['userId']);
$userPosts ->execute();

foreach ($userPosts as $post){ ?>

<div class="card posts">
  <h3>  <?php echo $post['title']; ?></h3>
  <p><?php echo $post['content']; ?> </p>
  <p><?php echo $post['post_date']; ?> </p>
  <a class="btn btn-primary" href="./editPost.php" role="button" value="<?php echo $user['postID'] ?>">Edit post</a>
  <a class="btn btn-danger" href="#" role="button">Delete post</a>

</div>
<?php
}
} else {
    echo "Please log in first to see this page."; ?>
    <a class="btn" href="./login.php">Login</a>

<?php } require __DIR__.'/views/footer.php'; ?>
