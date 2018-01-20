<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['username']))
{
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

$updateUser = $pdo->prepare("UPDATE user SET name= :username WHERE userId= :id");

$updateUser ->bindParam(':id', $_SESSION['userId']);
$updateUser ->bindParam(':username', $username);

$updateUser->execute();
redirect('../../profile.php');
//print_r($pdo->errorInfo());
}
