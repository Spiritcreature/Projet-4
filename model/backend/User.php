<?php

class User{
	
	private $_id;
	private $_login;
	private $_password;

	
	
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
	public function login(){ return $this->_login; }
	public function password(){ return $this->_password; }
	
	
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
	
	
	public function setLogin($login)
	{
		// on vérifie que c'est bien une chaine de caractères. 
		if (is_string($login))
		{
			$this->_login = $login;
		}
	}
	
	public function setPassword($password)
	{
		if (is_string($password))
		{
			$this->_password = $password;
		}
	}
}