<?php $title = "Authentification" ?>

<?php ob_start(); ?>

	<div class="auth">
		<h2>Veuillez vous authentifier.</h2>
			<form action="admin.php" method="post">
				<div>
					<label for="login"> Nom d'utilisateur :</label><br/>
					<input type="text" id="author" name="author" placeholder="Nom d'utilisateur..." required/>
				</div>
				<div>
					<label for="password" >Mot de passe :</label><br/>
					<input type="password" id="password" name="password" placeholder="Mot de passe..." required/>
				</div>
				<div>
					<button type="submit">Connexion</button>
				</div>
			</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>