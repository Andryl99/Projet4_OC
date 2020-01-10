<?php  $title = 'Admin'; ?>

<?php ob_start(); ?>
<h1>Espace administrateur</h1>



<ul>
    <li><a href='index.php?action=adminPosts'>Mes articles</a></li>
    <li><a href='index.php?action=adminDisplayReported'>Administration commentaires</a></li>
    <li><a href='index.php?action=listPosts'>Retour au site</a></li>
    
</ul>
<?php $content = ob_get_clean(); ?>

<?php require('templateBack.php'); ?>

 
