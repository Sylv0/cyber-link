<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we login users.
if(isset($_POST['email']) && isset($_POST['password']))
{
  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);


  $statement = $pdo->prepare('SELECT * FROM user WHERE email = :email');
  $statement ->bindParam(':email', $email);

  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if(!$user)
  {
    redirect('../../login.php');
  }

  if(password_verify($_POST['password'], $user['password']))
  {
    $_SESSION['userId'] = $user['userId'];

    unset($user['password']);
    redirect('../../index.php');
  }
}
