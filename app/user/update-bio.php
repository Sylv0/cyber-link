<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['bio']))
{
$bio = filter_var($_POST['bio'],FILTER_SANITIZE_STRING);

$setBio = $pdo->prepare("UPDATE user SET bio=:bio WHERE userId= :id");
$setBio ->bindParam(':id', $_SESSION['userId']);
$setBio ->bindParam(':bio', $bio);
$setBio ->execute();

redirect('user/../profile.php');
}
