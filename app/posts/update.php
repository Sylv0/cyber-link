<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


if(isset($_POST['title']) && isset($_POST['content']))
{
  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
  $postId = $_POST['postId'];

  $updatePost = $pdo->prepare("UPDATE posts SET title= :title, content= :content WHERE postId= :id");

  $updatePost ->bindParam(':id', $postId);
  $updatePost ->bindParam(':username', $username);

  $updatePost->execute();
  redirect('../../profile.php');

}
