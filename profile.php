<?php require __DIR__.'/views/header.php'; ?>
<?php
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
    <img src="<?php echo $pic ?>">
  </div>
  <ul>
    <li>Username: <?php echo $name ?></li>
    <li>Email: <?php echo $email ?></li>
    <li>Biography: <?php echo $bio ?></li>
  </ul>
</div>
<a class="btn" href="./updateProfile.php">Link</a>
<?php require __DIR__.'/views/footer.php'; ?>
