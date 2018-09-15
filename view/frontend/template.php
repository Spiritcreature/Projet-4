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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width"/>
		<?php if (isset($_SESSION['pseudo'])){ ?>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=77wncdxu48hfqzofqt90dtxlajeqxgf4sa9acnppg7i410pa"></script>
		<script>tinymce.init({ 
				selector:'textarea',
				skin: 'lightgray',
				max_height: 500,
  				max_width: 500,
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
				<img src="public/img/alaska.png" class="logo" alt="logo d'une chaine de montagne">
				<nav class="menu">
					<ul>
						<li><a href="index.php"><i class="fas fa-home"><span>Accueil</span></i></a></li>
						<li><a href="index.php?action=allPosts"><i class="fas fa-book"><span>Chapitres</span></i></a></li>
						<?php
							if(isset($_SESSION['pseudo']))
							{ ?> 
						<li><a href="#"><i class="fas fa-unlock"><span>Admin</span></i></a>
							<ul>
								<li><a href="index.php?action=write">Ecrire</a></li>
								<li><a href="index.php?action=adminAlert">Alertes</a></li>
								<li><a href="">Gerer les chapitres</a></li>
							</ul>
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