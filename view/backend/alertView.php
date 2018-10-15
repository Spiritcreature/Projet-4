<?php 

$title = "Commentaire signalé(s)";

 ob_start(); ?>

<div class="redaction">
	<fieldset>
		<table>
			<thead>
				<tr>
					<th>Supprimer</th>
					<th>Commentaire(s)</th>
					<th>Validation</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach($alerts as $alert){ ?>
				<tr>
					<td>
						<a href="index.php?action=removeComment&amp;id=<?= $alert->id() ?>" class="delete" onclick="return confirm('Etes vous sur de vouloir supprimer ?')">Supprimer</a>
					</td>
					<td class="text">
						<?= $alert->comment() ?>
					</td>
					<td>
						<a href="index.php?action=validationAlert&amp;id=<?= $alert->id() ?>&amp;alert=0" class="validate">Validation</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</fieldset>
</div>

<?php $content = ob_get_clean();

require('view/frontend/template.php'); ?>