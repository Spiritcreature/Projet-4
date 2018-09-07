<?php $title = htmlspecialchars($post->title()); ?>

<?php ob_start(); ?>

	<div class="news">
		<h3><?= htmlspecialchars($post->title()) ?><em> le <?= $post->creation_date() ?></em></h3>
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
<p></p>
<?php
	foreach ( $comments as $comment ) 
	{
?>
	<div class="comments">
		<p>
			<strong>
				<?= htmlspecialchars($comment->author()) ?>
			</strong> le <?= $comment->comment_date() ?>
			<form action="" method="post">
				<button>Signaler</button>
			</form>
		</p>
		<p>
			<?= nl2br($comment->comment()) ?>
		</p>
	<?php
			if (isset($_SESSION['pseudo']))
			{
	?>  
		<form action="" method="post">
			<button>Supprimer</button>
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