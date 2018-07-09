<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
		<header>
			<h1>Billet simple pour l'Alaska !</h1>
				<nav>
					<ul>
						<li><a href="index.php">Accueil</li>
						<li><a href="chapterView.php">Chapitre</a></li>
					</ul>
				</nav>
		</header>
        	<?= $content ?>
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