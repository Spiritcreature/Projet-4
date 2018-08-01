<?php

class Comment{
	
	private $_id;
	private $_post_id;
	private $_author;
	private $_comment;
	private $_comment_date;
	
	
	public function __construct($datas)
	{
		/*
		$this->setId($id);
		$this->setTitle($title);
		$this->setContent($content);
		$this->setCreation_date($creation_date);
		*/
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
	public function comment_date(){ return $this->_comment_date; }
	
	// liste des setters
	public function setId($id)
	{
		// On vérifie si ce nombre est bien strictement positif.
		if ($id > 0)
		{
		  // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
		  $this->_id = $id;
		}
	}
	
	public function setPost_id($postId)
	{
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
	
	public function setComment_date($commentDate)
	{
		$this->_comment_date = $commentDate;
	}
}
