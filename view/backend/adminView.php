<?php 

$title = "Administration";

 ob_start();
?>
		<div class="redaction">
			<fieldset>
				<h1 class="welcome">Bienvenue <?= $_SESSION['pseudo'] ?> !</h1>
				<p>Vous êtes à présent connecté sur votre interface d'administation. Vous allez pouvoir faire les actions suivantes à l'aide de votre nouveau menu ci-dessus :</p>
				<p>
					<ul>
						<li>Ecrire un nouveau chapitre.</li>
						<li>Valider ou supprimer les commentaires que vos lecteurs vous auront signalés.</li>
						<li>Modifier ou supprimer vos chapitres existants.</li>
						<li>Modifier votre login et/ou votre mot de passe.</li>
					</ul>
				</p>
			</fieldset>
		</div>
<?php $content = ob_get_clean();

require('view/frontend/template.php'); ?>