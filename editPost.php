<?php require __DIR__.'/views/header.php';

$id =$_POST['postID'];
echo $id;
$statement = $pdo->prepare('SELECT * FROM posts WHERE userId = :name');
$statement ->bindParam(':name', $_SESSION['userId']);

$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);?>

<article>
  <form action="app/posts/update.php" method="post">
    <div class="form-group">
      <label for="title">Edit Title</label>
      <input class="form-control" type="text" name="title" placeholder="Title" required>
    </div>

    <div class="form-group">
      <label for="content">Edit content</label>
      <input class="form-control" type="text" name="content" required>
    </div>
    <input type="hidden" name="postId" value="<?php echo $user['postID']?>">

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
</article>
<?php require __DIR__.'/views/footer.php'; ?>
