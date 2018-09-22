<?php

// Chargement des classes
require_once( 'model/frontend/PostManager.php' );
require_once( 'model/frontend/CommentManager.php' );
require_once( 'model/frontend/Post.php' );
require_once( 'model/frontend/Comment.php' );


function listPosts() {
	$postManager = new PostManager(); // Création d'un objet
	$posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

	require( 'view/frontend/accueil.php' );
}

function listAllPosts() {
	$allPostManager = new PostManager(); // Création d'un objet
	$allPosts = $allPostManager->getAllPosts(); // Appel d'une fonction de cet objet
	
	require( 'view/frontend/chapterView.php' );
}

function post() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost( $_GET[ 'id' ] );
	$comments = $commentManager->getComments( $_GET[ 'id' ] );
	$popup = '<div id="popup">Votre modification a bien été prise en compte.</div>';

	require( 'view/frontend/postView.php' );
}

function addComment($postId, $author, $comment) {
	$comment = new Comment(['post_id'=>$postId, 'author'=>$author, 'comment'=>$comment]);
	$commentManager = new CommentManager();

	$affectedLines = $commentManager->postComment( $comment );

	if ( $affectedLines === false ) {
		throw new Exception( 'Impossible d\'ajouter le commentaire !' );
	} else {
		header( 'Location: index.php?action=post&id=' . $comment->post_id() );
	}
}

