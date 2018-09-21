<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="Blog écrivain, Alaska, Jean Forteroche, roman en ligne, billet simple, billet simple en alaska,..." />
		<!-- Meta Facebook-->
		<meta property="og:title" content="<?= $title ?>" />
		<meta property="og:url" content="http://le-midgard.fr/Projet4/"/>
		<meta property="og:site_name" content="JeanForteroche.fr"/>
		<meta property="og:description" content="Blog écrivain, Alaska, Jean Forteroche, roman en ligne..."/>
		<meta property="og:image" content="public/img/jean.jpg"/>
		<meta name="viewport" content="width=device-width"/>
		<link href="public/css/style.css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<?php if (isset($_SESSION['pseudo'])){ ?>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=77wncdxu48hfqzofqt90dtxlajeqxgf4sa9acnppg7i410pa"></script>
		<script>tinymce.init({ 
				selector:'textarea',
				plugins : 'advlist autolink link image lists charmap print preview',
				forced_root_block : false,
				force_br_newlines : true,
				force_p_newlines : false,
				encoding: "UTF-8",
							 });
		</script>
		<?php } ?>
    </head>
        
    <body>
		<header>
				<img src="public/img/alaska.png" class="logo" alt="logo d'une chaine de montagne">
				<nav class="menu">
					<ul>
						<li><a href="index.php"><i class="fas fa-home"><span>Accueil</span></i></a></li>
						<li><a href="index.php?action=allPosts"><i class="fas fa-book"><span>Chapitres</span></i></a></li>
						<li><a href="mailto:jean.forteroche@yopmail.fr"><i class="fas fa-envelope"><span>Contact</span></i></a></li>
						<?php
							if(!isset($_SESSION['pseudo']))
							{ ?>
						<li><a href="index.php?action=login"><i class="fas fa-lock"><span>Login</span></i></a>
						<?php }else
							{ ?>
						<li><a href="#"><i class="fas fa-user-alt"><span>Administration</span></i></a>
							<ul>
								<li><a href="index.php?action=write">Ecrire</a></li>
								<li><a href="index.php?action=adminAlert">Gerer les Alertes</a></li>
								<li><a href="index.php?action=adminChapter">Gerer les chapitres</a></li>
							</ul>
							<li><a href="index.php?action=logout"><i class="fas fa-unlock"><span>Logout</span></i></a>
						</li>
						<?php
							} ?>
						
					</ul>
				</nav>
		</header>
		<section>
			
        	<?= $content ?>
		</section>
		<footer>
				<p>Copyright © Billet simple pour l'Alaska 2018 @ Alexis Dizet.</p>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="public/js/animation.js"></script>
		<script src="public/js/appStart.js"></script>
    </body>
</html>