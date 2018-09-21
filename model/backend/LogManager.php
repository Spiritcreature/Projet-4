<?php

require_once('model/frontend/Manager.php');
require_once('model/backend/User.php');
require_once('model/frontend/Post.php');
require_once('model/frontend/Comment.php');

class LogManager extends Manager
{
	// récupération de l'utilisateur et du mot de passe
	public function getUser( $user)
	{	
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM users WHERE login = :login' );
		$req->execute(array('login'=>$user));
		$answer = $req->fetch(PDO::FETCH_ASSOC);
		
		return new User($answer);
	}
	
	public function newPost($chapter)
	{	
		$title = $chapter->title();
		$content = $chapter->content();
		
		$db = $this->dbConnect();
		$newChapter = $db->prepare('INSERT INTO posts (title, content, creation_date)VALUES (?, ?, NOW())');
		$newChapter->execute(array($title, $content));
	}
	
	public function delComment($id)
	{
		$db = $this->dbConnect();
		$del = $db->prepare('DELETE FROM comments WHERE id = :id');
		$del->execute(array('id'=>$id));
		
	}
	
	public function alert($id, $alert)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments set alert= :alert WHERE id = :id');
		$req->execute(array('id'=>$id, 'alert'=>$alert));
		
	}
	
	public function commentsAlert()
	{
		$alerts = [];
		$db = $this->dbConnect();
		$listAlert = $db->query('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_datefr, alert FROM comments WHERE alert = 1');
		while($data = $listAlert->fetch(PDO::FETCH_ASSOC))
		{
			$alerts[] = new Comment($data);
		}
		return $alerts;
	}
	
	public function deleteChapter($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id = :id');
		$req->execute(array('id'=>$id));
	}
	
	public function update($id, $title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts set title= :title, content=:content WHERE id = :id');
		$req->execute(array('id'=>$id, 'title'=>$title, 'content'=>$content));
	}
}