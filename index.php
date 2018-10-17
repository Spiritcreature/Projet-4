<?php
session_start();
require('controller/frontendController.php');
require('controller/backendController.php');

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
				if (empty($_GET['id'] && $_POST['author'] && $_POST['comment']))
				{
					addmessage('danger' , 'Tous les champs ne sont pas remplis.');
					header ( 'Location: index.php?action=post&id=' . $_GET['id']);
				}else
				{
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				break;
			case ($_GET['action'] == 'login'):
				require ('view/frontend/authView.php');
				break;
			case ($_GET['action'] == 'logout'):
				logout();
				require ('view/frontend/authView.php');
				break;
			case ($_GET['action'] == 'auth'):
				if (empty($_POST['login'] && $_POST['password']))
				{
					addmessage('danger' , 'Tous les champs ne sont pas remplis.');
					header ( 'Location: index.php?action=login');
				}else
				{
					login($_POST['login'], $_POST['password']);
				}
				break;
			case ($_GET['action'] == 'write'):
				require ('view/backend/writePostView.php');
				break;
			case ($_GET['action'] == 'newPost'):
				if (empty($_POST['title'] && $_POST['title']))
				{
					addmessage('danger' , 'Tous les champs ne sont pas remplis.');
					header ( 'Location: index.php?action=write');
				}else
				{
				writePost($_POST['title'], $_POST['title']);
				}
				break;
			case ($_GET['action'] == 'removeComment'):
				removeComment($_GET['id']);
				break;
			case ($_GET['action'] == 'alert'):
				alertComment($_GET['id'], $_GET['alert'], $_GET['origin']);
				break;
			case ($_GET['action'] == 'adminAlert'):
				listAlert();
				break;
			case ($_GET['action'] == 'validationAlert'):
				validAlert($_GET['id'], $_GET['alert']);
				break;
			case ($_GET['action'] == 'adminChapter'):
				adminListChapter();
				break;
			case ($_GET['action'] == 'removeChapter'):
				removeChapter($_GET['id']);
				break;
			case ($_GET['action'] == 'modifyView'):
				modifyView();
				break;
			case ($_GET['action'] == 'modifyPost'):
				if (empty($_POST['title'] && $_POST['content']))
				{
					addmessage('danger' , 'Attention vous avez dû effacer le titre ou son histoire.');
					header ( 'Location: index.php?action=modifyView&id=' . $_GET['id']);
				}else
				{
				modifyPost($_GET['id'],$_POST['title'], $_POST['content']);
				}
				break;
			case ($_GET['action'] == 'administration'):
				require('view/backend/adminView.php');
				break;
			case ($_GET['action'] == 'listUser'):
				require('view/backend/updateUserView.php');
				break;
			case ($_GET['action'] == 'updateUser'):
				if (empty($_POST['login'] && $_POST['new_password'] && $_POST['conf_password']))
				{
					addmessage('danger' , 'Tous les champs ne sont pas remplis</div>');
					header ( 'Location: index.php?action=modifyView&id=' . $_GET['id']);
				}else
				{
				updateUser($_GET['id'], $_POST['login'], $_POST['new_password'], $_POST['conf_password']);
				}
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


