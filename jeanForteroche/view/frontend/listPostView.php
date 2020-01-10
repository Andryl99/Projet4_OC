<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="fluid-container">
    <header class="row">
        <h1 class="col-sm-12" id="main-title">L'épopée de Jean Forteroche</h1>
    </header>
</div>

<div class="container">
    <div class="row">
        <h3 class="col-md-12" id="articles">Derniers articles</h3>
    </div>
</div>


<?php
while ($data = $posts->fetch())
{
?>
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?= $data['title'] ?></h5>
        <p class="card-text"><?= 
                $textExtract = substr($data['content'], 0, 200);
                echo "..."; ?></p>
        <a href="index.php?action=post&id=<?= $data['id'] ?>" class="card-link">Lire l'article</a>
      </div>
    </div>
    <br/>
</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('templateFront.php'); ?>
 
