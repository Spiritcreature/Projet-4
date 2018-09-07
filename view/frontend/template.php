<!DOCTYPE html>
<html lang="fr"><head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="Blog écrivain, Alaska, Jean Forteroche, roman en ligne, billet simple, billet simple en alaska,..." />
		<!-- Meta Facebook-->
		<meta property="og:title" content="<?= $title ?>" />
		<meta property="og:url" content="http://le-midgard.fr/Projet4/"/>
		<meta property="og:site_name" content="JeanForteroche.fr"/>
		<meta property="og:description" content="Blog écrivain, Alaska, Jean Forteroche, roman en ligne..."/>
		<meta property="og:image" content="public/img/jean.jpg"/>
		<link href="public/css/style.css" rel="stylesheet" />
		<meta name="viewport" content="width=device-width"/>
		<?php if (isset($_SESSION['pseudo'])){ ?>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=77wncdxu48hfqzofqt90dtxlajeqxgf4sa9acnppg7i410pa"></script>
		<script>tinymce.init({ 
				selector:'textarea',
				forced_root_block : false,
				force_br_newlines : true,
				force_p_newlines : false
							 });
		</script>
		<?php } ?>
    </head>
        
    <body>
		<header>
			<h1 class="title">Billet simple pour l'Alaska !</h1>
				<nav class="menu">
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="index.php?action=allPosts">Chapitre</a></li>
						<?php
							if(isset($_SESSION['pseudo']))
							{ ?>  
						<li><a href="index.php?action=write">Ajouter un chapitre</a></li>
						<?php
							} ?>
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
				<?php
					if(isset($_SESSION['pseudo']))
					{ ?>  
					<a href="index.php?action=logout">Déconnexion</a>
				<?php 
					} 
					else
					{ ?>
					<a href="index.php?action=login">Administration</a>
				<?php
					} ?>
			</div>
		</footer>
    </body>
</html>