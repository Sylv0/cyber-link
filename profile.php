<?php require __DIR__.'/views/header.php'; ?>
<?php
$statement = $pdo->prepare('SELECT * FROM user WHERE userId = :name');
$statement ->bindParam(':name', $_SESSION['userId']);

$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);
$name= $user['name'];
$email = $user['email'];
$bio = $user['bio'];

?>
<div class="profile-c">
<ul>
  <li>Username: <?php echo $name ?></li>
  <li>Email: <?php echo $email ?></li>
  <li>Biography: <?php echo $bio ?></li>
</ul>
<div class="profile-img">
  <img src="" alt=""placeholder="">
  <form action="app/user/updateProfile.php" method="post" enctype="multipart/form-data">
           <label for="myImage">Choose a PNG image to upload</label>
           <input type="file" name="myImage" accept=".png" required>
           <button type="submit">Upload</button>
</div>
</div>
<?php require __DIR__.'/views/footer.php'; ?>
