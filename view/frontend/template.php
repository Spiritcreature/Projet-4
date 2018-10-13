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
				editor_deselector : "mceNoEditor",
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
			<div>
				<img src="public/img/alaska.png" class="logo" alt="logo d'une chaine de montagne">
			</div>
			<div>
				<nav class="menu">
					<ul>
						<?php
							if(!isset($_SESSION['pseudo']))
							{ ?>
						<li><a href="index.php"><i class="fas fa-home"><span>Accueil</span></i></a></li>
						<li><a href="index.php?action=allPosts"><i class="fas fa-book"><span>Chapitres</span></i></a></li>
						<li><a href="mailto:&#106;%65%61%6e.f%6frt&#101;&#114;o%63&#104;e&#64;y%6f&#112;&#109;%61%69&#108;%2ef&#114;"><i class="fas fa-envelope"><span>Contact</span></i></a></li>
						<li><a href="index.php?action=login"><i class="fas fa-lock"><span>Login</span></i></a>
						<?php }else
							{ ?>
								<li><a href="index.php?action=write">Ecrire un chapitre</a></li>
								<li><a href="index.php?action=adminAlert">Gerer les Commentaires</a></li>
								<li><a href="index.php?action=adminChapter">Gerer les chapitres</a></li>
								<li><a href="index.php?action=listUser"><i class="fas fa-user-alt"><span>Gestion utilisateur</span></i></a></li>
								<li><a href="index.php?action=logout"><i class="fas fa-unlock"><span>Logout</span></i></a></li>
						<?php
							} ?>
					</ul>
				</nav>
			</div>
		</header>
		<section>
			<?php
            if ( isset($_SESSION['flash']) && !empty($_SESSION['flash']) )
            {  foreach ($_SESSION['flash'] as $key => $value): ?>             
                    <div class="alert-<?= $key ?>">
                        <strong> <?= $value ?> </strong>
                    </div>
            <?php endforeach; }
            unset($_SESSION['flash']);
            ?>
        	<?= $content ?>
		</section>
		<footer>
				<p>Copyright © Billet simple pour l'Alaska 2018 @ Alexis Dizet.</p>
		</footer>
    </body>
</html>