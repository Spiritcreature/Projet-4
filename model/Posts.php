<?php

class Posts{
	
	private $_id;
	private $_title;
	private $_content;
	private $_creation_date;
	
	
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
	public function title(){ return $this->_title; }
	public function content(){ return $this->_content; }
	public function creation_date(){ return $this->_creation_date; }
	
	// liste des setters
	public function setId($id)
	{
		$id = (int) $id;
		// On vérifie ensuite si ce nombre est bien strictement positif.
		if ($id > 0)
		{
		  // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
		  $this->_id = $id;
		}
	}
	
	public function setTitle($title)
	{
		// on vérifie que c'est bien des lettres
		if (is_string($title))
		{
			$this->_title = $title;
		}
	}
	
	public function setContent($content)
	{
		if (is_string($content))
		{
			$this->_content = $title;
		}
	}
	
	public function setCreation_date($creation_date)
	{
		$$creation_date = (int) $creation_date;
		// On vérifie ensuite si ce nombre est bien strictement positif.
		if ($id > 0)
		{
			// Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
			$this->_creation_date = $creation_date;
		}
	}
}