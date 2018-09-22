<?php


// Chargement des classes
require_once('model/backend/User.php');
require_once('model/backend/LogManager.php');
require_once('model/frontend/Post.php');
require_once('model/frontend/PostManager.php' );


function login($login, $password)
{
	$logManager = new LogManager();
	$loginExist = $logManager->getUser($login);

	if ($loginExist != false )
    {
        $userExist = new User($loginExist);
        if (password_verify($password, $userExist->password()) == true)
        {
            $_SESSION['pseudo'] = $userExist->login();
			addMessage('sucess','Bonjour Jean !');
			header( 'Location: index.php' );
        }else{
            addMessage('danger','Nom d\'utilisateur ou mot de passe incorrect !');
        }
    }else{
        addMessage('danger','Nom d\'utilisateur ou mot de passe incorrect !');
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
		addMessage('danger','Impossible d\'ajouter ce nouveau chapitre !' );
	} 
	else 
	{
		header( 'Location: index.php?action=allPosts');
	}
}

function removeComment($id)
{
	$logManager = new LogManager();
	$remove = $logManager->delComment($id);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de supprimer ce commentaire !' );
	}
	else
	{
		header ('Location: index.php?action=adminAlert');
	}
}

function alertComment($id, $alert, $origin)
{
	$logManager = new LogManager();
	$remove = $logManager->alert($id, $alert);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de signaler ce commentaire !' );
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

function validAlert($id, $alert)
{
	$logManager = new LogManager();
	$remove = $logManager->alert($id, $alert);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de signaler ce commentaire !' );
	}
	else
	{
		header ('Location: index.php?action=adminAlert');
	}
}
	
function adminListChapter()
{
	$allPostManager = new PostManager();
	$chapters = $allPostManager->getAllPosts();
			
	require('view/backend/adminChapterView.php');
	
}

function removeChapter($id)
{
	$logManager = new LogManager();
	$remove = $logManager->deleteChapter($id);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de supprimer ce chapitre !' );
	}
	else
	{
		header ('Location: index.php?action=adminChapter');
	}
}
	
function modifyView()
{
	$postManager = new PostManager();
	$post = $postManager->getPost( $_GET[ 'id' ] );
			
	require('view/backend/modifyPostView.php');
}


function modifyPost($id, $title, $content)
{
	$logManager = new LogManager();
	$updatePost = $logManager->update($id, $title, $content);
			
	if ( $updatePost === false ) 
	{
		addMessage('danger', 'Impossible de modifier ce chapitre !' );
	}
	else
	{
		header ('Location: index.php?action=post&id=' . $_GET['id']);
	}
}

function addMessage($key,$value )
{
    $_SESSION['flash'][$key] = $value;
}