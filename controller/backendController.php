<?php


// Chargement des classes
require_once('model/backend/User.php');
require_once('model/backend/LogManager.php');



function login($login, $password)
{
	$logManager = new LogManager();
	$verif = $logManager->getUser($login);

	// comparaison du mot de passe du formulaire et de la bdd
	$correctPass = password_verify($password, $verif->password());

	if($correctPass)
		{
			session_start();
			$_SESSION['pseudo'] = $verif->login();
			header( 'Location: index.php' );
    	}
		else 
		{
			echo 'Mauvais identifiant ou mot de passe !';
		}
	require( 'view/frontend/authView.php' );
}

function logout()
{
	session_start();
	session_destroy();
	unset($_SESSION['pseudo']);
	header('location: index.php');
}


function isValidSession()
{
	session_start();
	if(!isset($_SESSION['pseudo']))
	{
		header('location: index.php?action=login');
	}
}