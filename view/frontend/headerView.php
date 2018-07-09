<?php ob_start(); ?>

<header>
	<h1>Billet simple pour l'Alaska !</h1>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</li>
			<li><a href="chapterView.php">Chapitre</li>
			<li><a href="identificationView.php">Administration</a></li>
		</ul>
	</nav>
</header>

<?php $header = ob_get_clean(); ?>

<?php require('template.php'); ?>