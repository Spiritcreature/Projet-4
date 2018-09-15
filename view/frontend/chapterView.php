<?php $title = 'Un billet pour l\'Alaska !';

ob_start();

foreach ($allPosts as $data)
{
?>
    <div class="news">
        <h3><u><?= htmlspecialchars($data->title()) ?><em>le <?= $data->creation_datefr() ?></em></u></h3>
        <p>
            <?= nl2br(substr(htmlspecialchars($data->content()),0,840) . '...') ?>
            <a href="index.php?action=post&amp;id=<?= $data->id() ?>" class="next-text">Lire la suite.</a>
        </p>
    </div>

<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>