<?php 

	$title = htmlspecialchars($post->title());
	ob_start();
?>

	<div class="news">
		<h3><u><?= htmlspecialchars($post->title()) ?><em> le <?= $post->creation_datefr() ?></em></u></h3>
		<p>
			<?= nl2br(htmlspecialchars($post->content())) ?>
		</p>
	</div>
		<span class="feature"></span>
	<div class="form_comment">
		<h2>Commentaires</h2>
		<form action="index.php?action=addComment&amp;id=<?= $post->id() ?>" method="post">
			<div>
				<p><label for="author">Auteur :</label></p>
				<input type="text" id="author" name="author"/>
			</div>
			<div>
				<p><label for="comment">Commentaire :</label></p>
				<textarea id="comment" name="comment"></textarea>
			</div>
			<div>
				<button type="submit">Valider</button>
			</div>
		</form>
	</div>
<p><span></span></p>

<?php
	foreach ( $comments as $comment ) 
	{
?>

	<div class="comments">
		<p>
			<u><strong><?= htmlspecialchars($comment->author()) ?></strong> le <?= $comment->comment_datefr() ?></u>
		</p>
		<?php
	
			if( $comment->alert() == true)
			{
				echo('Commentaire signalé');
			}else{ ?>
				<form action="index.php?action=alert&amp;id=<?= $comment->id() ?>&amp;alert=1&amp;origin=<?= $post->id() ?>" method="post">
				<button type="submit">Signaler</button>
			</form>
			<?php } ?>
		<p>
			<?= nl2br($comment->comment()) ?>
		</p>	
	</div>
<?php				
	}
?>

<?php $content = ob_get_clean();

require('template.php'); ?>