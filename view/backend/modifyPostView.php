<?php $title = "Modifier un chapitre";

	ob_start();

	if (!isset($_POST['submit']))
	{ 
		echo ('<h2>Votre modification a bien été prise en compte.</h2>');
	}
?>
	<div class="redaction">
		<form action="index.php?action=modifyPost&amp;id=<?= $post->id(); ?>" method="post">
			<fieldset>
				<legend>Modifier votre chapitre : </legend>
					<label for="title">Titre du chapitre : </label><br/>
						<textarea id="title" name="title"  placeholder="Chapitre X : ..." required><?= $post->title(); ?></textarea>
					<label for="content">Histoire du chapitre :</label><br/>
						<textarea id="content" name="content" required><?= $post->content(); ?></textarea>
					<p>
						<button type="submit" class="valide">Valider</button>
					</p>
			</fieldset>
		</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>