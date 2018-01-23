<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';



if(isset($_POST['title']) && isset($_POST['content']))
{
  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);
  $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
  $postid = $_POST['postid'];

  $updatePost = $pdo->prepare("UPDATE posts SET title= :title, link=:link, content= :content WHERE postid= :id");

  $updatePost ->bindParam(':title', $title);
  $updatePost ->bindParam(':link', $link);
  $updatePost ->bindParam(':content', $content);
  $updatePost ->bindParam(':id', $postid);

  if(!$updatePost->execute()){
    echo "errooorrrr";
  }
  redirect('../../profile.php');

}
