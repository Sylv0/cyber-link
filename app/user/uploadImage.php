<?php declare(strict_types=1);

require __DIR__.'/../autoload.php';

$statement = $pdo->prepare('SELECT name FROM user WHERE userId = :name');
$statement ->bindParam(':name', $_SESSION['userId']);

$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

mkdir(''$user['name']);

if (isset($_FILES['myImage'])) {
  mkdir($_SESSION['name'])
    $image = $_FILES['myImage'];
    $destination = sprintf('%s/%s-%s', __DIR__, date('ymd'), $image['name']);
    move_uploaded_file($image['tmp_name'], $destination);
}

    redirect('user/../profile.php');
}
