<?php $title = 'Un billet pour l\'Alaska !'; ?>

<?php ob_start(); ?>
<h1>Les dernières publications.</h1>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(substr(htmlspecialchars($data['content']),0,840) . '...') ?>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite.</a>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>