<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if(isset($_POST['username']) && isset($_POST['password'])) {

  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);

  $statement = $pdo->query("INSERT INTO 'user'(name, password, email) VALUES ('$username', '$password', '$email')");
  redirect('../../login.php');
}
