<?php require __DIR__.'/views/header.php';

if (isset($_SESSION['userId'])) {
	 ?>

<article>
    <form action="app/posts/store.php" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label for="content">Link</label>
        <input class="form-control" type="url" name="link" required>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="content">Text</label>
        <input class="form-control" type="text" name="content" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </article>
<?php
else {
	echo "Please log in first to see this page."; ?>
  <a class="btn" href="./login.php">Login</a>
<?php }
 require __DIR__.'/views/footer.php'; ?>
