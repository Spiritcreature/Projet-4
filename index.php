<?php
session_start();
require('controller/frontendController.php');
require('controller/backendController.php');

try { 
	if (isset($_GET['action']) && !empty($_GET['action']))
	{
		switch ($_GET['action'])
		{
			case ($_GET['action'] == 'listPosts'):
				listPosts();
				break;
			case ($_GET['action'] == 'post'):
				post();
				break;
			case ($_GET['action'] == 'allPosts'):
				listAllPosts();
				break;
			case ($_GET['action'] == 'addComment'):
				addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				break;
			case ($_GET['action'] == 'login'):
				require ('view/frontend/authView.php');
				break;
			case ($_GET['action'] == 'logout'):
				logout();
				require ('view/frontend/authView.php');
				break;
			case ($_GET['action'] == 'auth'):
				login($_POST['login'], $_POST['password']);
				break;
			case ($_GET['action'] == 'write'):
				require ('view/backend/writePostView.php');
				break;
			case ($_GET['action'] == 'newPost'):
				writePost($_POST['title'], $_POST['content']);
				break;
			case ($_GET['action'] == 'removeComment'):
				removeComment($_GET['id'], $_GET['deleteComment']);
				break;
			case ($_GET['action'] == 'alert'):
				alertComment($_GET['id'], $_GET['alert'], $_GET['origin']);
				break;
			case ($_GET['action'] == 'adminAlert'):
				listAlert();
				break;
			default:
				header('HTTP/1.0 404 Not Found');
				include('view/frontend/error-404.php');
				exit();
		}
	}
	else
	{
		listPosts();
	}
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
	echo 'Erreur : ' . $e->getMessage();
}
