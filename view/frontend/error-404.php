<?php $title = "Page introuvable !" ?>
<?php ob_start(); ?>

<img src="public/img/book.png" class="book">

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>