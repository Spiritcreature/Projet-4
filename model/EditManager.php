<?php

require_once('model/Manager.php');

class EditManager extends Manager
{

	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));
		$post= $comments->fetch();

		return $comments;
	}

	public function editComment($comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('UPDATE INTO comments(comment, comment_date) VALUES(?, NOW())');
		$editLines = $comments->execute(array($comment));

		return $editLines;
	}	
}