<?php

class Database
{
	
	private $pdo;
	
    protected function dbConnect()
    {
		try
		{
			// cette condition permet d'initialiser une seule fois PDO si la connexion est demandée plusieurs fois
			if($this->pdo === null)
			{
				$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
				$this->pdo = $db;
			}	
			return $this->pdo;	
		}
		catch (Exception $e)
		{
        	die('Erreur : ' . $e->getMessage());
		}
    }
}