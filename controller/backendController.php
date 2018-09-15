<?php


// Chargement des classes
require_once('model/backend/User.php');
require_once('model/backend/LogManager.php');
require_once('model/frontend/Post.php');
require_once('model/frontend/PostManager.php' );


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
			echo ('Mauvais identifiant ou mot de passe !');
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

// Rédaction d'un nouveau post.
function writePost($title, $content)
{
	$chapter = new Post(['title'=>$title,'content'=>$content]);
	$logManager = new LogManager();
	$newPost = $logManager->newPost($chapter);
	
	if ( $newPost === false ) 
	{
		throw new Exception( 'Impossible d\'ajouter ce nouveau chapitre !' );
	} 
	else 
	{
		header( 'Location: index.php?action=allPosts');
	}
}

function removeComment($id, $deleteComment)
{
	$logManager = new LogManager();
	$remove = $logManager->delComment($id);
	
	if ( $remove === false ) 
	{
		throw new Exception( 'Impossible de supprimer ce commentaire !' );
	}
	else
	{
		header ('Location: index.php?action=post&id=' .$_GET['deleteComment']);
	}
}

function alertComment($id, $alert, $origin)
{
	$logManager = new LogManager();
	$remove = $logManager->alert($id, $alert);
	
	if ( $remove === false ) 
	{
		throw new Exception( 'Impossible de signaler ce commentaire !' );
	}
	else
	{
		header ('Location: index.php?action=post&id=' .$_GET['origin']);
	}
	
}

function listAlert()
{
	$logManager = new LogManager();
	$alerts = $logManager->commentsAlert();
		
	require('view/backend/alertView.php');
	
}


	

