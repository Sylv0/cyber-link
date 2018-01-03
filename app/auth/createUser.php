<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
