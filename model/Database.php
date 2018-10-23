<?php

class Database
{
	
	private $pdo;
	
	const HOST = 'localhost';
	const DBNAME = 'blog';
	const CHARSET = 'utf8';
	const USER = 'root';
	const PASSWORD = null;
	
    protected function dbConnect()
    {
		try
		{
			// cette condition permet d'initialiser une seule fois PDO si la connexion est demandée plusieurs fois
			if($this->pdo === null)
			{
				$db = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME . ';charset=' . self::CHARSET , self::USER , self::PASSWORD , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
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