<?php 

	$title = htmlspecialchars($post->title());
	ob_start();
?>

	<div class="news">
		<h2><?= htmlspecialchars($post->title()) ?><em> le <?= $post->creation_datefr() ?></em></h2>
		<p>
			<?= nl2br(htmlspecialchars($post->content())) ?>
		</p>
	</div>

	<div class="form_comment">
		<h2>Commentaires</h2>
		<form action="index.php?action=addComment&amp;id=<?= $post->id() ?>" method="post">
			<div>
				<label for="author">Auteur</label><br/>
				<input type="text" id="author" name="author"/>
			</div>
			<div>
				<label for="comment">Commentaire</label><br/>
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
			<strong>
				<?= htmlspecialchars($comment->author()) ?>
			</strong> le <?= $comment->comment_datefr() ?>
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
	<?php
			if (isset($_SESSION['pseudo']))
			{
	?>  
		<form action="index.php?action=removeComment&amp;id=<?= $comment->id() ?>&amp;deleteComment=<?= $post->id() ?>" method="post">

			<button type="submit">Supprimer</button>
	<?php	
			}
	?>
		</form>		
	</div>
<?php				
	}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>