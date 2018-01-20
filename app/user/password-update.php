<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';
if(isset($_POST['Oldpassword'])&& isset($_POST['Newpassword']) && isset($_POST['Repeatpassword']))
{
  $getPassword = $pdo->prepare('SELECT * FROM user WHERE userId= :id');
  $getPassword ->bindParam(':id', $_SESSION['userId']);
  $getPassword->execute();

  if(password_verify($_POST['Oldpassword'], $getPassword->fetch(PDO::FETCH_ASSOC)['password'])&& $_POST['Newpassword'] == $_POST['Repeatpassword'] )
  {
    $password = password_hash(filter_var($_POST['Newpassword'], FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
  }
  $setPassword = $pdo->prepare("UPDATE user SET password=:password WHERE userId= :id");
  $setPassword ->bindParam(':id', $_SESSION['userId']);
  $setPassword ->bindParam(':password', $password);
  $setPassword ->execute();

redirect('../../profile.php');

}
