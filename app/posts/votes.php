<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


$user =$_POST['userid'];
$post =$_POST['postid'];

if(isset($_POST['downvote']))
{
--$votes;
}
if(isset($_POST['upvote']))
{
++$votes;
}


$addVote = $pdo->prepare("INSERT INTO 'votes'(postID, userID, vote_count) VALUES ($post,$user,$vote)");
$addVote->bindParam(':votes', $votes);
$addVote->bindParam(':userID', $user);
$addVote->bindParam('postID', $post);

$addVote->execute();




  /*$addvotes = $pdo->prepare('UPDATE votes SET vote_count= vote_count +1, userID = :userID WHERE postID = :postID');
  $addvotes->bindParam(':votes', $votes);
  $addvotes->bindParam(':userID', $user);
  $addvotes->bindParam('postID', $post);

  $addvotes->execute();*/




//redirect('../../index.php');
