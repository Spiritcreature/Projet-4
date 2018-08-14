<?php

require_once('model/frontend/Manager.php');
require_once('model/backend/User.php');

class LogManager extends Manager
{
	private function getUser($user)
	{		
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT login, password FROM users WHERE login = :login' );
		$req->execute(array('login'=>$user));
		$reponse = $req->fetch();
		
		return new User($reponse);
	}
	
}