<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if(isset($_POST['username']) && isset($_POST['password'])) {

  $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

  $statement = $pdo->query("INSERT INTO 'user'(name, password, email) VALUES ('$user', '$password', '$email')");
  redirect('../../login.php');
}
