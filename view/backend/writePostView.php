<?php $title = "Nouveau Chapitre" ?>
<?php ob_start(); ?>

<?php 

if (isset($_SESSION['pseudo'])){ ?>

	<div class="redaction">
		<h2 class="chapter">Rédaction d'un nouveau chapitre.</h2>
			<form action="index.php?action=newPost" method="post">
				<label for="title">Titre du chapitre : </label><br/>
				<p>
					<input type="text" id="title" name="title"  placeholder="Chapitre X : ..." required/>
				</p>
				<p>
					<label for="content">Histoire du chapitre :</label><br/>
				</p>
				<p>
					<textarea id="content" name="content" placeholder="Votre texte..."></textarea>
				</p>
				<p>
					<button type="submit">Valider</button>
				</p>
			</form>
	</div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>