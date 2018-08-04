<?php

require_once('model/frontend/Manager.php');
require_once('model/frontend/Post.php');

class PostManager extends Manager
{

	public function getPosts()
	{
		$post = [];
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 3');
		
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$post[] = new Post($data);
		}

		return $post;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return  new Post($post);
	}
	
	public function getAllPosts()
	{
		$post = [];
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts ORDER BY creation_date ASC');
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$post[] = new Post($data);
		}

		return $post;
	}
}