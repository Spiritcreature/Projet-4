<?php $title = "Modifier un chapitre";

	ob_start();
?>
	<div id="popup">Votre modification a bien été prise en compte.</div>
	<div class="redaction">
		<form action="index.php?action=modifyPost&amp;id=<?= $post->id(); ?>" method="post">
			<fieldset>
				<legend>Modifier votre chapitre : </legend>
					<label for="title">Titre du chapitre : </label><br/>
						<textarea id="title" name="title"  placeholder="Chapitre X : ..." ><?= $post->title(); ?></textarea>
					<label for="content">Histoire du chapitre :</label><br/>
						<textarea id="content" name="content" ><?= $post->content(); ?></textarea>
					<p>
						<button type="submit" id="update">Valider</button>
					</p>
			</fieldset>
		</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>