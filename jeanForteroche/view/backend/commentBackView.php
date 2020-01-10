<?php  $title = 'Admin'; ?>

<?php ob_start(); ?>
<h1>Administration commentaires</h1>

<a href='index.php?action=getAdminViews'>Retour à l'administration</a>

<?php
while ($data = $reportedComm->fetch())
{
?>
    <div class="news">
        <h3>
            <?= $data['author'] ?>
        </h3>
        
        <p>
            <?= nl2br($data['content']) ?>
        </p>
        <a href='index.php?action=adminDeleteComm&idComm=<?= $data['id'] ?>'>Supprimer commentaire / </a>
        <a href='index.php?action=adminValidateComm&idComm=<?= $data['id'] ?>'>Valider commentaire</a>
    </div>
<?php
}
$reportedComm->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('templateBack.php'); ?>

 
