<?php


// Chargement des classes
require_once('model/backend/User.php');
require_once('model/backend/LogManager.php');
//require_once('model/backend/AdminManager.php');


function login($login, $password)
{
	$user = new User(['login'=>$login, 'password'=>$password]);
	$logManager = new LogManager();
	$log = $logManager->getUser($user);
	
	if(isset($_POST['login']) AND isset($_POST['password']) AND $_POST['login'] AND $_POST['password'] == new User ($log))
	{
		//header( 'Location: index.php' );
		return 'ok';
	}
	else
	{
		echo 'Login ou mot de passe invalide.';
	}
	
	require( 'view/frontend/authView.php' );
}
