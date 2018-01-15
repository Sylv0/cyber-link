<?php require __DIR__.'/views/header.php'; ?>

<article>
  <h1><?php echo $config['title']; ?></h1>
  <p>This is the home page.</p>

</article>
<?php if (isset($_SESSION['userId'])) {

  $statement = $pdo->prepare('SELECT name FROM user WHERE userId = :name');
  $statement ->bindParam(':name', $_SESSION['userId']);

  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);
  echo "Welcome " .$user['name']. "!";
  ?>
  <h1>Post</h1>
  <?php

  $posts = $pdo->prepare('SELECT * FROM posts');
  $posts -> execute();

  $allPosts= $posts ->fetchAll(PDO::FETCH_ASSOC);

  foreach ($allPosts as $post) {

  ?>

    <div class="card">
  <h3>  <?php echo $post['title']; ?></h3>
  <p><?php echo $post['content']; ?> </p>
  <p><?php echo $post['post_date']; ?> </p>

</div>
<?php } ?>


<?php }else {
  echo "Please log in first to see this page.";
} ?>

<?php require __DIR__.'/views/footer.php'; ?>
