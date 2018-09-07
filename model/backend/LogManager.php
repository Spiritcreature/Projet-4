<?php

require_once('model/frontend/Manager.php');
require_once('model/backend/User.php');
require_once('model/frontend/Post.php');

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
	
}