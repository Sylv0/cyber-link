<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_FILES['myImage'])) {

    $image = $_FILES['myImage']['name'];

    $statement = $pdo->prepare("INSERT INTO user(profile_image) VALUES (:profile_image)");

    $statement -> bindParam(':profile_image', $image);

    $statement->execute();

    redirect('../../profile.php');
}

if (isset($_POST['email']))
{
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
}
if (isset($_POST['bio']))
{
  $bio = $_POST['bio'];
}
if (isset($_POST['password']))
{
$password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
}
if (isset($_POST['username']))
{
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
}
if($username||$password||$bio||$email)
{
$statement = $pdo->prepare("UPDATE user SET name= :username, password=:password, email=:email, bio=:bio WHERE userId= :id");

$statement ->bindParam(':id', $_SESSION['userId']);
$statement ->bindParam(':email', $email);
$statement ->bindParam(':username', $username);
$statement ->bindParam(':password', $password);
$statement ->bindParam(':bio', $bio);


$statement->execute();
redirect('../../updateProfile.php');
//print_r($pdo->errorInfo());
}
