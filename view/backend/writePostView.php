<?php $title = "Nouveau Chapitre" ?>
<?php ob_start(); ?>
	<div class="redaction">
		<form action="index.php?action=newPost" method="post">
			<fieldset>
				<legend>Rédiger votre chapitre :</legend>
					<label for="title">Titre du chapitre : </label><br/>
						<textarea id="title" name="title"  placeholder="Chapitre X : ..." required/></textarea>
						<label for="content">Histoire du chapitre :</label><br/>
						<textarea id="content" name="content" placeholder="Votre texte..."></textarea>
					<p>
						<button type="submit">Valider</button>
					</p>
			</fieldset>
		</form>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>