<?php $title = "Modifier ses informations";
ob_start();

if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
{

?>
	<form action="index.php?action=updateUser&amp;id=<?= $_SESSION['id'] ?>" method="post" class="auth">
		<fieldset>
			<legend>Modifier vos informations : </legend>
				<label for="login"> Nom d'utilisateur :</label>
				<input type="text" id="login" name="login" value="<?= $_SESSION['pseudo']?>" required/>
				<label for="new_password" >Votre nouveau mot de passe :</label>
				<input type="password" id="new_password" name="new_password" required/>
				<label for="conf_password" >Confirmer le mot de passe :</label>
				<input type="password" id="conf_password" name="conf_password"  required/>
			<p><button type="submit">Modifier</button></p>
		</fieldset>
	</form>

<?php 
} 
	$content = ob_get_clean();
	require('view/frontend/template.php'); ?>


