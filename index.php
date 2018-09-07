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
				removeComment($_GET['id']);
				break;
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



/*
try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
		elseif ($_GET['action'] == 'allPosts') {
                listAllPosts();
        }
		elseif ($_GET['action'] == 'author') {
                listAllPosts();
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
	echo 'Erreur : ' . $e->getMessage();
}
*/
