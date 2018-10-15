<?php 

$title = "Commentaire signalé(s)";

 ob_start(); ?>

	<table>
		<thead>
			<tr>
				<th>Supprimer</th>
				<th>Titre du chapitre</th>
				<th>Modifier</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($chapters as $chapter){ ?>
			<tr>
				<td>
					<a href="index.php?action=removeChapter&amp;id=<?= $chapter->id() ?>" class="delete" onclick="return confirm('Etes vous sur de vouloir supprimer ?')">Supprimer</a>
				</td>
				<td>
					<?= $chapter->title() ?>
				</td>
				<td>
					<a href="index.php?action=modifyView&amp;id=<?= $chapter->id() ?>" class="validate">Modifier</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

<?php $content = ob_get_clean();

require('view/frontend/template.php'); ?>