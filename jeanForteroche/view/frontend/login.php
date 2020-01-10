<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Connectez-vous</h1>

<?php 
    if($_GET['wrongPass'] == 'true')
    {
        ?>
        <p id="wrongPass">Mot de passe ou identifiant erroné, merci de réessayer</p>
        <?php
    }
?>

<form action="index.php?action=checkLogin" method="post" class="loginForm">
            <h4>Connection</h4>
            <p><label name="login">Pseudo : <input type="text" name="login"/></label></p>
            <p><label name="password">Mot de passe : <input type="password" name="password"/></label></p>
            <input type="submit" text="Valider"/>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templateFront.php'); ?>
 
