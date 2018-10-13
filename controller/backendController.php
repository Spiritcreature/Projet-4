<?php


// Chargement des classes
require_once('model/backend/User.php');
require_once('model/backend/UserManager.php');
require_once('model/frontend/Post.php');
require_once('model/frontend/PostManager.php' );


function login($login, $password)
{
	$userManager = new UserManager();
	$loginExist = $userManager->getUser($login);

	if ($loginExist != false )
    {
        $userExist = new User($loginExist);
		
        if (password_verify($password, $userExist->password()) == true)
        {
            $_SESSION['pseudo'] = $userExist->login();
			$_SESSION['id'] = $userExist->id();
			header( 'Location: index.php?action=administration' );
			exit();
			
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
	exit();
}

// Rédaction d'un nouveau post.
function writePost($title, $content)
{
	$chapter = new Post(['title'=>$title,'content'=>$content]);
	$userManager = new UserManager();
	$newPost = $userManager->newPost($chapter);
	
	if ( $newPost === false ) 
	{
		addMessage('danger','Impossible d\'ajouter ce nouveau chapitre !' );
	} 
	else 
	{
		header( 'Location: index.php?action=allPosts');
		exit();
	}
}

function removeComment($id)
{
	$userManager = new UserManager();
	$remove = $userManager->delComment($id);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de supprimer ce commentaire !' );
	}
	else
	{
		addMessage('confirm', 'Commentaire supprimé.' );
		header ('Location: index.php?action=adminAlert');
		exit();
	}
}

function alertComment($id, $alert, $origin)
{
	$userManager = new UserManager();
	$remove = $userManager->alert($id, $alert);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de signaler ce commentaire !' );
	}
	else
	{
		header ('Location: index.php?action=post&id=' .$_GET['origin']);
		exit();
	}
	
}

function listAlert()
{
	$userManager = new UserManager();
	$alerts = $userManager->commentsAlert();
		
	require('view/backend/alertView.php');
}

function validAlert($id, $alert)
{
	$userManager = new userManager();
	$remove = $userManager->alert($id, $alert);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de valider ce commentaire !' );
	}
	else
	{
		addMessage('confirm', 'Commentaire conservé.' );
		header ('Location: index.php?action=adminAlert');
		exit();
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
	$userManager = new userManager();
	$remove = $userManager->deleteChapter($id);
	
	if ( $remove === false ) 
	{
		addMessage('danger', 'Impossible de supprimer ce chapitre !' );
	}
	else
	{
		addMessage('confirm', 'Chapitre supprimé.' );
		header ('Location: index.php?action=adminChapter');
		exit();
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
	$userManager = new UserManager();
	$updatePost = $userManager->updatePost($id, $title, $content);
			
	if ( $updatePost === false ) 
	{
		addMessage('danger', 'Impossible de modifier ce chapitre !' );
	}
	else
	{
		addMessage('confirm', 'Modifications effectuées !' );
		header ('Location: index.php?action=post&id=' . $_GET['id']);
		exit();
	}
}

function addMessage($key,$value )
{
    $_SESSION['flash'][$key] = $value;
}

function updateUser($id, $login, $newPass, $confPass)
{
	$pseudo = htmlspecialchars($login);
	$nPass = htmlspecialchars($newPass);
	$cPass = htmlspecialchars($confPass);	
	
	if($nPass == $cPass)
	{
		$pass_hach = password_hash($cPass, PASSWORD_DEFAULT);
		$userManager = new UserManager();
		$updatePass = $userManager->modifypass($id, $pseudo, $pass_hach) ;
		addMessage('confirm', 'Votre mot de passe a été modifié.' );
	}
	else
	{
		addMessage('danger', 'Les mots de passe ne correspondent pas.' );
		
	}
	
	require('view/backend/updateUserView.php');
}

