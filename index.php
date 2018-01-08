<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>
</article>
<?php if(isset($_SESSION['user'])){ ?>
  <article>
      <h1>Post</h1>

      <form action="app/posts/store.php" method="post">
          <div class="form-group">
              <label for="Title">Title</label>
              <input class="form-control" type="text" name="title" placeholder="Title" required>
          </div><!-- /form-group -->

          <div class="form-group">
              <label for="context">Text</label>
              <input class="form-control" type="text" name="context" required>

          </div><!-- /form-group -->

          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </article>
<?php }?>
<?php require __DIR__.'/views/footer.php'; ?>
