<?php $title = "Nouveau Chapitre" ?>
<?php ob_start(); ?>

<?php 

if (isset($_SESSION['pseudo'])){ ?>

	<div class="redaction">
		<h2>Rédaction d'un nouveau chapitre.</h2>
			<form action="index.php?action=newPost" method="post">
				<div>
				<label for="title">Titre du chapitre</label><br/>
				<input type="text" id="title" name="title"  placeholder="Chapitre X : ..." required/>
			</div>
			<div>
				<label for="content">Commentaire</label><br/>
				<textarea id="content" name="content" placeholder="Votre texte..."></textarea>
			</div>
			<div>
				<button type="submit">Valider</button>
			</div>
			</form>
	</div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>