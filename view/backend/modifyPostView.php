<?php $title = "Modifier un chapitre" ?>
<?php ob_start(); ?>

	<div class="redaction">
		<form action="index.php?action=modifyPost&amp;id=<?= $post->id(); ?>" method="post">
			<label for="title">Titre du chapitre : </label><br/>
			<p>
				<textarea id="title" name="title"  required><?= $post->title(); ?></textarea>
			</p>
			<p>
				<label for="content">Histoire du chapitre :</label><br/>
			</p>
			<p>
				<textarea id="content" name="content" required><?= $post->content(); ?></textarea>
			</p>
			<p>
				<button type="submit" class="valide">Valider</button>
			</p>
		</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>