<?php

class Comment{
	
	private $_id;
	private $_post_id;
	private $_author;
	private $_comment;
	private $_comment_datefr;
	private $_alert;
	
	
	public function __construct($datas)
	{
		$this->hydrate($datas);
	}
	
	
	// Hydratation de l'objet pour assigner des valeurs aux attributs.
	public function hydrate(array $datas)
	{
		foreach ($datas as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set' . ucfirst($key);
			// Si le setter correspondant existe.
    		if (method_exists($this, $method))
    		{
     			// On appelle le setter.
      			$this->$method($value);
    		}
		}
	}
	
	// liste des getters
	public function id(){ return $this->_id; }
	public function post_id(){ return $this->_post_id; }
	public function author(){ return $this->_author; }
	public function comment(){ return $this->_comment; }
	public function comment_datefr(){ return $this->_comment_datefr; }
	public function alert(){ return $this->_alert; }
	
	// liste des setters
	public function setId($id)
	{
		//on convertit en nombre entier.
		$id = (int)$id;
		// On vérifie si ce nombre est bien strictement positif.
		if ($id > 0)
		{
		  // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
		  $this->_id = $id;
		}
	}
	
	public function setPost_id($postId)
	{
		//on convertit en nombre entier.
		$postId = (int)$postId;
		// on vérifie que c'est bien une chaine de caractères. 
		if ($postId > 0)
		{
			$this->_post_id = $postId;
		}
	}
	
	public function setAuthor($author)
	{
		if (is_string($author))
		{
			$this->_author = $author;
		}
	}
	
	public function setComment($comment)
	{
		if (is_string($comment))
		{
			$this->_comment = $comment;
		}
	}
	
	public function setComment_datefr($commentDate)
	{
		if (is_string($commentDate))
		{
			$this->_comment_datefr = $commentDate;
		}
	}
	
	public function setAlert($alert)
	{
		$alert = (int)$alert;
		if ($alert > 0)
		{
			$this->_alert = $alert;
		}
	}
}
