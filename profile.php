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
<div class="card">
<ul>
  <li>Username: <?php echo $name ?></li>
  <li>Email: <?php echo $email ?></li>
  <li>Biography: <?php echo $bio ?></li>
</ul>

</div>
<?php require __DIR__.'/views/footer.php'; ?>
