<?php

require_once('model/Manager.php');
require_once('model/Comment.php');

class CommentManager extends Manager
{

	public function getComments($postId)
	{
		$comments = [];
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$req->execute(array($postId));
		while ($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$comments[]= new Comment($data);
		}
		
		return $comments;
		
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$req->execute(array($postId, $author, $comment));

		return new Comment($req);
	}	
}