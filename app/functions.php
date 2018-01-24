<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
	/**
	* Redirect the user to given path.
	*
	* @param string $path
	*
	* @return void
	*/
	function redirect($path)
	{
		header("Location: ${path}");
		exit;
	}
}
function getPosts($pdo)
{
	$Getposts = $pdo->prepare('SELECT * FROM posts ORDER BY post_date DESC');
	$Getposts -> execute();

	$Posts= $Getposts ->fetchAll(PDO::FETCH_ASSOC);
	return $Posts;
}
function getVotes($pdo,$postId)
{
	$Getvotes = $pdo->prepare("SELECT SUM(vote_count) as votes FROM votes WHERE postID = :postid ");
	$Getvotes ->bindParam(':postid', $postId);
	if(!$Getvotes ->execute())
	{
		$pdo->errorInfo();
	}

	$Votes= $Getvotes->fetch(PDO::FETCH_ASSOC);

	return $Votes;

}
