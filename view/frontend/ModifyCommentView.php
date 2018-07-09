
<p><a href="index.php?action=post&amp;id=<?= $post['id'] ?>">Retour à la liste des billets</a></p>

<?php ob_start(); ?>


<form action="index?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <button type="submit" value="modifier">Modifier</button>
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>