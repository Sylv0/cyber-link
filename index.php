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
  ?>

  <div class="alert alert-success">
  <strong>Welcome <?php $user['name'];?>!</strong> You can now view and create posts!
</div>


  <article>
    <h1>Create a post</h1>

    <form action="app/posts/store.php" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" placeholder="Title" required>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="content">Link</label>
        <input class="form-control" type="url" name="link" value="https://"required>
      </div><!-- /form-group -->

      <div class="form-group">
        <label for="content">Text</label>
        <input class="form-control" type="text" name="content" required>
      </div><!-- /form-group -->

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </article>
  <?php

  $Posts= getPosts($pdo);

?>
<h1> Posts: </h1>
<?php

  foreach ($Posts as $post) {
    ?>

    <div class="card posts">
      <h3>  <?php echo $post['title']; ?></h3>
      <a href="<?php echo $post['link']?>"><?php echo $post['link']?></a>
      <p><?php echo $post['content']; ?> </p>
      <p><?php echo $post['post_date']; ?> </p>
      <form action="app/posts/votes.php" method="post">
        <div class="btn-group btn-group-sm">
          <button type="submit" name="upvote" class="btn btn-primary">Upvote </button>
          <button type="submit" name="downvote"class="btn btn-danger">Downvote </button>
          <input type="hidden" name="postid" value="<?php echo $post['postid']?>">
          <input type="hidden" name="userid" value="<?php echo $post['userID']?>">
        </div>
      </form>
			<?php $votes = getVotes($pdo,$post['postid']); ?>
			<p><?php var_dump($votes);?></p>
    </div>
   <?php }


 }else {
  echo "Please log in first to see this page.";
}

 require __DIR__.'/views/footer.php'; ?>
