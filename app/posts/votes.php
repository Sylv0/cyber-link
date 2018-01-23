<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


$user =$_POST['userid'];
$post =$_POST['postid'];

if(isset($_POST['downvote']))
{
$votes = -1;
}
if(isset($_POST['upvote']))
{
$votes = 1;
}

$addVote = $pdo->prepare("INSERT INTO 'votes'(postID, userID, vote_count) VALUES (:postID,:userID,:votes)");
$addVote->bindParam(':votes', $votes);
$addVote->bindParam(':userID', $user);
$addVote->bindParam('postID', $post);

$addVote->execute();

redirect('../../index.php');
