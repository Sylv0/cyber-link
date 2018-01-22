<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we store/insert new posts in the database.

if(isset($_POST['title'], $_POST['content'], $_POST['link']))
{
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$link = filter_var($_POST['link'], FILTER_SANITIZE_STRING);
$content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
$user = $_SESSION['userId'];


$statement = $pdo->query("INSERT INTO 'posts'(title,link, content, userID, post_date) VALUES ('$title','$link','$content', '$user', datetime())");
redirect('../../index.php');
}
