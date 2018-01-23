<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';
$id = $_SESSION['userId'];
$deleteUser = $pdo->prepare("DELETE FROM user WHERE userId= :id");
$deleteUser ->bindParam(':id', $id);
$deleteUser -> execute();

$deleteUserPosts = $pdo->prepare("DELETE FROM posts WHERE userId =:id");
$deleteUserPosts ->bindParam(':id', $id);
$deleteUserPosts -> execute();
session_unset();

redirect('../../login.php');
