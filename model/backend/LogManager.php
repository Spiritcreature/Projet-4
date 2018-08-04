<?php

require_once('model/frontend/Manager.php');
require_once('model/backend/User.php');

class LogManager extends Manager
{
	private function readUser($user)
	{
		$loginAdmin = htmlspecialchars($user->login());
		$passwordAdmin= htmlspecialchars($user->password());
		
		$db = $this->dbConnect();
		$req = $db->query('SELECT user, password, FROM users');
		$req->execute(array($loginAdmin, $passwordAdmin));
	}
	
}