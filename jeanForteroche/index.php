<?php
require('controller/frontend.php');
require('controller/backend.php');

$backendController = new BackendController();
$frontendController = new FrontendController();

session_start();

try{
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'listPosts')
        {
            $frontendController->listPosts();
        }
        elseif ($_GET['action'] == 'post')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                $frontendController->post();
            } else
            {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de post envoyé !');
            }
        }
        elseif ($_GET['action'] == 'reportComment')
        {
            if(isset($_GET['commentId']) && $_GET['commentId'] > 0)
            {
                $frontendController->reportComment($_GET['commentId']);
            }
        }
        elseif ($_GET['action'] == 'getLogin')
        {
            $frontendController->getLogin();
        }
        elseif ($_GET['action'] == 'checkLogin')
        {
            if (isset($_POST['login']) && isset($_POST['password'])){
                $frontendController->loging($_POST['login'], $_POST['password']);
            }
        }
        elseif (isset($_SESSION['authorised']) && $_SESSION['authorised'] == 1)
        {            
            if($_GET['action'] == 'adminPosts')
            {
                $backendController->adminListPosts();
            }
            elseif($_GET['action'] == 'addPost')
            {
                $backendController->adminAddPost($_POST['title'], $_POST['content']);
            }
            elseif($_GET['action'] == 'deletePost')
            {
                $backendController->adminDeletePost($_GET['id']);
            }
            elseif($_GET['action'] == "adminGetUpdateForm" && isset($_GET['id']) && $_GET['id'] > 0)
            {
                $backendController->adminGetUpdateForm($_GET['id']);
            }
            elseif($_GET['action'] == "updatePost" && isset($_GET['id']) && $_GET['id'] > 0)
            {
                $backendController->adminUpdatePost($_GET['id'], $_POST['content']);
            }
            elseif($_GET['action'] && isset($_GET['id']) && $_GET['id'] > 0 && isset($_POST['content']))
            {
                $backendController->adminUpdatePost($_GET['id'], $_POST['content']);
            }
            elseif($_GET['action'] == 'getAdminViews')
            {
                $backendController->adminGetViews();
            }
            elseif($_GET['action'] == "adminDisplayReported")
            {
                $backendController->adminDisplayReported();
            }
            elseif($_GET['action'] == "adminDeleteComm" && isset($_GET['idComm']) && $_GET['idComm'] > 0)
            {
                $backendController->adminDeleteComm($_GET['idComm']);
            }
            elseif($_GET['action'] == "adminValidateComm" && isset($_GET['idComm']) && $_GET['idComm'] > 0)
            {
                $backendController->adminValidateComm($_GET['idComm']);
            }
        }
    }
    else
    {
        $frontendController->listPosts();
    }
}catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}
