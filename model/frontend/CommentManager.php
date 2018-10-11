<?php

require_once('model/frontend/Database.php');
require_once('model/frontend/Comment.php');

class CommentManager extends Manager
{

	public function getComments($postId)
	{
		$comment = [];
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_datefr, alert FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));
		while ($data = $comments->fetch(PDO::FETCH_ASSOC))
		{
			$comment[]= new Comment($data);
		}
		
		return $comment;
		
	}

	public function postComment($comment)
	{
		$postIdCom = htmlspecialchars($comment->post_id());
		$authorCom = htmlspecialchars($comment->author());
		$commentCom = htmlspecialchars($comment->comment());
		
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$comments->execute(array($postIdCom, $authorCom, $commentCom));
	}	
}