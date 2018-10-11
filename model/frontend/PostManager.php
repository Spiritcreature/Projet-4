<?php

require_once('model/frontend/Database.php');
require_once('model/frontend/Post.php');

class PostManager extends Manager
{

	public function getPosts()
	{
		$post = [];
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_datefr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');
		
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$post[] = new Post($data);
		}

		return $post;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_datefr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return  $this->asError($post);
	}
	
	public function getAllPosts()
	{
		$post = [];
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_datefr FROM posts ORDER BY creation_date ASC');
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$post[] = new Post($data);
		}

		return $post;
	}
	
	public function asError($post)
	{
		if ($post != false)
		{
			return new Post ($post);
		}
		else
		{
			header('HTTP/1.0 404 Not Found');
			include('view/frontend/error-404.php');
			exit();
		}
	}
}