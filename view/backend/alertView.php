<?php 

$title = "Commentaire signalé(s)";

 ob_start(); ?>

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
					<a href="index.php?action=removeComment&amp;id=<?= $alert->id() ?>" class="delete">Supprimer</a>
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

<?php $content = ob_get_clean();

require('view/frontend/template.php'); ?>