<?php 

	$title = $post->title();
	ob_start();
?>

	<div class="news">
		<h3><u><?= $post->title()  ?></u></h3>
		<p>
			<?= nl2br($post->content()) ?>
		</p>
	</div>
		<span class="feature"></span>
	<div class="form_comment">
		<form action="index.php?action=addComment&amp;id=<?= $post->id() ?>" method="post">
			<fieldset>
				<legend>Ajouter un commentaire :</legend>
				<label for="author">Auteur :</label>
				<input type="text" id="author" name="author" required/>
				<label for="comment">Commentaire :</label>
				<textarea id="comment" name="comment"></textarea>
				<p><button type="submit">Valider</button></p>
			</fieldset>
		</form>
	</div>
<p><span></span></p>

<?php
	foreach ( $comments as $comment ) 
	{
?>

	<div class="comments">
		<div class=comment-text>
			<p><u><strong><?= $comment->author()?></strong> le <?= " " . $comment->comment_datefr() ?></u></p>
			<p><?= nl2br($comment->comment()) ?></p>
		</div>
		<?php

				if( $comment->alert() == true)
				{
					echo('<div class="alert-text">Commentaire signalé <i class="fas fa-exclamation-triangle"></i></div>');
				}else{ ?>
					<form action="index.php?action=alert&amp;id=<?= $comment->id() ?>&amp;alert=1&amp;origin=<?= $post->id() ?>" method="post">
					<button type="submit" class="alert">Signaler</button>
				</form>
				<?php } ?>
	</div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>