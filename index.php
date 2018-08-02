<?php



require('controller/frontendController.php');

if (isset($_GET['action']))
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
		default:
			echo 'Il y a une erreur avec l\'instruction "action =" dans le router';	
	}
}
else
{
	listPosts();
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
