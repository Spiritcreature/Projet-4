<?php

require_once('model/frontend/Manager.php');
require_once('model/backend/User.php');

class LogManager extends Manager
{
	
	public function getUser( $user)
	{	
	/*var_dump($user);
		$userLog = htmlspecialchars($user->login());
		$userPass = htmlspecialchars($user->password());
		
		var_dump($userLog);
		die();
		*/
		// récupération de l'utilisateur et du mot de passe
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM users WHERE login = :login' );
		$req->execute(array('login'=>$user));
		$answer = $req->fetch(PDO::FETCH_ASSOC);
		
		return new User($answer);
	}
	
}