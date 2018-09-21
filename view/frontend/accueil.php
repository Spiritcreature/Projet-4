<?php $title = 'Un billet pour l\'Alaska !'; 

ob_start(); ?>
		<div class="author">
			<h1 class="jean"><u><strong>Jean Forteroche :</strong></u></h1>
				<img src="public/img/jean.jpg" alt="photo d'identité de Jean Forteroche" class="photo_identite">
			<div class="biography">
				<p>Jean Forteroche est né en 1966 sur l'île Adak, en Alaska, et y a passé une partie de son enfance avant de s'installer en France avec sa mère et sa sœur.Il a rédigé son premier roman LES NAUFRAGES lors d'un voyage en mer.Après avoir parcouru plus de 40 000 milles sur les océans, il échoue lors de sa tentative de tour du monde en solitaire sur un trimaran qu'il a dessiné et construit lui-même.En 2013, il publie LE DERNIER MILE récit de son propre naufrage dans les Caraïbes lors de son voyage de noces quelques années plus tôt.Ce livre fait partie de la liste des best-sellers du Figaro. Publié en France en janvier 2010, LES NAUFRAGES remporte immédiatement un immense succès. Il remporte le prix Médicis et s'est vendu à plus de 300 000 exemplaires.Porté par son succès, Jean Forteroche est aujourd'hui traduit en dix-huit langues dans plus de soixante pays. Une adaptation cinématographique par une société de production française est en cours.En 2017, il décide de publier en ligne chapitre par chapitre sur son propre site, son dernier roman : <strong>BILLET SIMPLE POUR L'ALASKA.</strong></p>
			</div>
		</div>
	<div class="feature"></div>
	<h2 class="last_chapter">Dernière publication</h2>

<?php

foreach ($posts as $post)
{
?>

    <div class="news">
        <h3><u><?= $post->title() ?><em> le <?= $post->creation_datefr() ?></em> :</u></h3>
        	<p><?= nl2br(substr($post->content(),0,840) . '...') ?>
				<a href="index.php?action=post&amp;id=<?= $post->id() ?>" class="next-text">Lire la suite.</a>
        	</p>
    </div>

<?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>