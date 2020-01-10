<?php  $title = 'Admin'; ?>

<?php 

$postManager = new PostManager();
$postText = $postManager->getPost($_GET['id']);
?>

<?php ob_start(); ?>
<h1>Modification article</h1>

<div class="blockAddPost">
        <form action="index.php?action=updatePost&id=<?= $_GET['id'] ?>" method="post">
            <p><label name="content">Contenu : <textarea class="textTiny" name="content"><? echo $postText['content'] ?></textarea></label></p>
            <input type="submit" text="Valider"/>
        </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('templateBack.php'); ?>

 
    