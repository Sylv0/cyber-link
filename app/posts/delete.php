<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';
$id = $_GET['postid'];
$deletePost = $pdo->prepare("DELETE FROM posts WHERE postid= :id");
$deletePost ->bindParam(':id', $id);
$deletePost -> execute();

redirect('../../profile.php');
