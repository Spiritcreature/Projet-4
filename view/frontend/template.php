<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
    </head>
        
    <body>
		<header>
			<h1 class="title">Billet simple pour l'Alaska !</h1>
				<nav class="menu">
					<ul>
						<li><a href="index.php">Accueil</li>
						<li><a href="index.php?action=allPosts">Chapitre</a></li>
					</ul>
				</nav>
		</header>
		<section>
        	<?= $content ?>
		</section>
		<footer>
			<div>
				<p>@Corporate: Jean Forteroche</p>
			</div>
			<div class="admin">
				<a href="identificationView.php">Administration</a>
			</div>
		</footer>
    </body>
</html>