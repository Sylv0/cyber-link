<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$getPassword = $pdo->prepare('SELECT * FROM user WHERE userId= :id');
$getPassword ->bindParam(':id', $_SESSION['userId']);
$getPassword->execute();


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
if(password_verify($_POST['Oldpassword'], $getPassword->fetch(PDO::FETCH_ASSOC)['password'])&& $_POST['Newpassword'] == $_POST['Repeatpassword'] )
{
  $password = password_hash(filter_var($_POST['Newpassword'], FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);

}
if (isset($_POST['username']))
{
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
}
if($username||$password||$bio||$email)
{
$updateUser = $pdo->prepare("UPDATE user SET name= :username, password=:password, email=:email, bio=:bio WHERE userId= :id");

$updateUser ->bindParam(':id', $_SESSION['userId']);
$updateUser ->bindParam(':email', $email);
$updateUser ->bindParam(':username', $username);
$updateUser ->bindParam(':password', $password);
$updateUser ->bindParam(':bio', $bio);


$updateUser->execute();
redirect('../../updateProfile.php');
//print_r($pdo->errorInfo());
}
