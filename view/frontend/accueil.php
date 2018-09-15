<?php $title = 'Un billet pour l\'Alaska !'; 

ob_start(); ?>
		<div class="author">
				<img src="public/img/jean.jpg" alt="photo d'identité de Jean Forteroche" class="photo_identite">
			<div class="biography">
				<h1 class="jean"><u>Jean Forteroche</u></h1>
				<p>Je suis né à Bordeaux en France et j'y ai vécu mon enfance avec mon frère et ma soeur. C'est à l'âge de 23 ans, que je me suis mis à parcourir la France et à faire différents métiers. Puis à 32 ans j'ai rejoins mon frère à Lille, j'ai commencé à écrire quelques livres basés sur mes voyages.
				3 ans plus tard, une maison d'édition me contacte pour me publier et rapidement mes livres ont remportés de francs succès. Ils ont ensuite été traduits en 18 langues. J'ai finis par m'installer en Alaska en 2016 et c'est là, que j'ai décidé de vous publier mon dernier Roman en ligne chapitre par chapitre, nommé : "Billet simple pour l'alaska".</p>
			</div>
		</div>
	<div class="feature"></div>
	<h2 class="last_chapter">Dernière plublication</h2>

<?php

foreach ($posts as $post)
{
?>

    <div class="news">
        <h3><u><?= htmlspecialchars($post->title()) ?><em> le <?= $post->creation_datefr() ?></em> :</u></h3>
        	<p><?= nl2br(substr(htmlspecialchars($post->content()),0,840) . '...') ?>
				<a href="index.php?action=post&amp;id=<?= $post->id() ?>" class="next-text">Lire la suite.</a>
        	</p>
    </div>

<?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>