<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Administration des articles</h1>

<div class="row" >
    <div class="col-lg-4" id="adminSubMenu">
        <a href='index.php?action=getAdminViews'>Retour à l'administration</a>
        <em class="specSeparator">-</em>
        <a href=#addPostForm>Ajouter un article</a>
    </div>
</div>



<h3>Articles publiés</h3>
<?php
while ($data = $posts->fetch())
{
?>

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?= $data['title'] ?></h5>
        <p class="card-text"><?= nl2br($data['content']) ?></p>
        <em><a href="index.php?action=deletePost&id=<?=$data['id'] ?>">Supprimer article /</a></em>
        <em><a href="index.php?action=adminGetUpdateForm&id=<?= $data['id'] ?>">Modifier article /</a></em>
        <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
      </div>
    </div>
    <br/>
</div>

<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('templateBack.php'); ?>
 
<h3 class="col-lg-12">Ajouter un article</h3>


<div class="col-lg-12">
        <form action="index.php?action=addPost" class="col-lg-8 blockAddPost" id="addPostForm" method="post">
            <p><label name="title">Titre : <input type="text" name="title"/></label></p>
            <p><label name="content">Contenu : <input type="textarea" class="textTiny" name="content"/></label></p>
            <input type="submit" text="Valider"/>
        </form>
</div>