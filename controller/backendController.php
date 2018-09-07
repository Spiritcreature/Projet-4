<?php


// Chargement des classes
require_once('model/backend/User.php');
require_once('model/backend/LogManager.php');
require_once('model/frontend/Post.php');


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

// Fonction pour faire aparaitre les options suplémentaires une fois logué.
function isValidSession()
{
	
	if(!isset($_SESSION['pseudo']))
	{
		session_start();
	}
}

// Rédaction d'un nouveau post.
function writePost($title, $content)
{
	$chapter = new Post(['title'=>$title,'content'=>$content]);
	$logManager = new LogManager();
	$newPost = $logManager->newPost($chapter);
	
	if ( $newPost === false ) {
		throw new Exception( 'Impossible d\'ajouter ce nouveau chapitre !' );
	} else {
		header( 'Location: index.php?action=allPosts');
	}
}

