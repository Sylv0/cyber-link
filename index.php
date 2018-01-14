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

  echo "Welcome " .$user['name']. "!"

  ?>
  <article>
    <h1>Post</h1>

    <form action="app/posts/store.php" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" placeholder="Title" required>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="content">Text</label>
        <input class="form-control" type="text" name="content" required>
      </div><!-- /form-group -->

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </article>
<?php }else {
  echo "Please log in first to see this page.";
} ?>

<?php require __DIR__.'/views/footer.php'; ?>
