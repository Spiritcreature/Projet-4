<?php

// Chargement des classes
require_once( 'model/PostManager.php' );
require_once( 'model/CommentManager.php' );
require_once( 'model/EditManager.php' );
require_once( 'model/Posts.php' );


function listPosts() {
	$postManager = new PostManager(); // Création d'un objet
	$posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

	require( 'view/frontend/listPostsView.php' );
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

	require( 'view/frontend/postView.php' );
}

function addComment( $postId, $author, $comment ) {
	$commentManager = new CommentManager();

	$affectedLines = $commentManager->postComment( $postId, $author, $comment );

	if ( $affectedLines === false ) {
		throw new Exception( 'Impossible d\'ajouter le commentaire !' );
	} else {
		header( 'Location: index.php?action=post&id=' . $postId );
	}
}

function editComment( $comment ) {
	$editManager = new EditManager();
	$editLines = $editManager->editComment( $comment );

	if ( $editLines === false ) {
		throw new Exception( 'Impossible d\'ajouter le commentaire !' );
	} else {
		require( 'view/frontend/ModifyCommentView.php' );
	}
}