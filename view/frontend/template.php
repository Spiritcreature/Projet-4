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
		<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
		<meta name="viewport" content="width=device-width"/>
		<?php if (isset($_SESSION['pseudo'])){ ?>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=77wncdxu48hfqzofqt90dtxlajeqxgf4sa9acnppg7i410pa"></script>
		<script>tinymce.init({ 
				selector:'textarea',
				skin: 'lightgray',
				max_height: 500,
  				max_width: 500,
				min_height: 300,
  				min_width: 300,
				forced_root_block : false,
				force_br_newlines : true,
				force_p_newlines : false,
				entity_encoding : "raw",
				encoding: "UTF-8",
							 });
		</script>
		<?php } ?>
    </head>
        
    <body>
		<header>
			<div>
				<img src="public/img/alaska.png" class="logo">
			</div>
			<div>
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
			</div>
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