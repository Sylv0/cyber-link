<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we store/insert new posts in the database.

if(isset($_POST['title']) && isset($_POST['content']))
{
$title = $_POST['title'];
$content = $_POST['content'];
$user = $_SESSION['userId'];


$statement = $pdo->query("INSERT INTO 'posts'(title, content, userID, post_date) VALUES ('$title', '$content', '$user', datetime())");
redirect('../../index.php');
}
