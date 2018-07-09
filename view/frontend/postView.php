<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

	<div class="news">
		<h3>
			<?= htmlspecialchars($post['title']) ?>
			<em>le <?= $post['creation_date_fr'] ?></em>
		</h3>

		<p>
			<?= nl2br(htmlspecialchars($post['content'])) ?>
		</p>
	</div>

	<div class="comments">
		<h2>Commentaires</h2>
		<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
			<div>
				<label for="author">Auteur</label><br/>
				<input type="text" id="author" name="author"/>
			</div>
			<div>
				<label for="comment">Commentaire</label><br/>
				<textarea id="comment" name="comment"></textarea>
			</div>
			<div>
				<input type="submit"/>
			</div>
		</form>
	</div>
	<?php
	while ( $comment = $comments->fetch() ) {
		?>
	<p>
		<strong>
			<?= htmlspecialchars($comment['author']) ?>
		</strong> le
		<?= $comment['comment_date_fr']  . " "  ?><a href="view/frontend/ModifyCommentView.php?action=editComment&amp;id=<?= $comment['id'] ?>" class="modify_comment">Modifier</a>
	</p>
	<p>
		<?= nl2br(htmlspecialchars($comment['comment'])) ?>
	</p>
	<?php
	}
	?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>