<?php declare(strict_types=1);

require __DIR__.'/../autoload.php';

$statement = $pdo->prepare('SELECT name FROM user WHERE userId = :id');
$statement ->bindParam(':id', $_SESSION['userId']);

$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if (isset($_FILES['myImage'])) {

  $imageName = 'userImages/'.$user['name'].".image.jpg";
  $image = $_FILES['myImage'];

  
  if(move_uploaded_file($image['tmp_name'],'../../'.$imageName))
  {
    $upload = $pdo->prepare("UPDATE user SET profile_image= :picture WHERE userId =:name");
    $upload->bindParam(':picture', $imageName);
    $upload->bindParam(':name', $_SESSION['userId']);

    $upload->execute();
  }

  redirect('../../profile.php');

}
