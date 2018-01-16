<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['email']))
{
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

$setEmail = $pdo->prepare("UPDATE user SET email=:email WHERE userId= :id");
$setEmail ->bindParam(':id', $_SESSION['userId']);
$setEmail ->bindParam(':email', $email);
$setEmail ->execute();

redirect('user/../profile.php');
}
