<?php $title = "Authentification" ?>
<?php ob_start(); ?>

<?php 

if (!isset($_SESSION['pseudo'])){ ?>
	<form action="index.php?action=auth" method="post" class="auth">
		<fieldset>
			<legend>Veuillez vous authentifier :</legend>
				<label for="login"> Nom d'utilisateur :</label>
				<input type="text" id="login" name="login" placeholder="Nom d'utilisateur..." required/>
				<label for="password" >Mot de passe :</label>
				<input type="password" id="password" name="password" placeholder="Mot de passe..." required/>
			<p><button type="submit">Connexion</button></p>
		</fieldset>
	</form>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


