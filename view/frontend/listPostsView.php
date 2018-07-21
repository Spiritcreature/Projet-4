<?php $title = 'Un billet pour l\'Alaska !'; ?>

<?php ob_start(); ?>


<h1>Les dernières publications.</h1>

<?php
while ($data = new Posts($reqPosts))
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data->id()) ?>
            <em>le <?= $data->creation_date() ?></em>
        </h3>
        
        <p>
            <?= nl2br(substr(htmlspecialchars($data->content()),0,840) . '...') ?>
            <a href="index.php?action=post&amp;id=<?= $data->id() ?>">Lire la suite.</a>
        </p>
    </div>

<?php
}
$data->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>