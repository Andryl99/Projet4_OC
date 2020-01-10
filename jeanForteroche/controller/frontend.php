<?php 

require_once('model/frontend/CommentManager.php');
require_once('model/frontend/PostManager.php');
require_once('model/frontend/LoginManager.php');


class FrontendController
{
    public function listPosts(){
    
        $postManager = new PostManager(); 
        $posts = $postManager->getPosts();

        require('view/frontend/listPostView.php');
    
    }
    
    public function post(){
    
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        //get the post
        $post = $postManager->getPost($_GET['id']);
        //get the post's comments
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }
    
    public function addComment($postId, $author, $comment){
    
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if($affectedLines === false) {
            throw new Exception("Impossible d'ajouter le commentaire");
        } else
        {
            header('Location:index.php?action=post&id=' . $_GET['id']);
        }
    }
    
    public function reportComment($commentId) {
    
        $commentManager = new CommentManager();
        $reportedComment = $commentManager->reportComment($commentId);

        if($reportedComment === false) {
            throw new Exception("Impossible de signaler ce commentaire");
        }else {
            header('Location:index.php?action=post&id=' . $_GET['id']);
        }
    }
    
    public function loging($login, $password){
    
        $loginManager = new LoginManager();
        $loginResult = $loginManager->checkLogin($login, $password);

        $result = $loginResult -> fetch();

        if(!$result){
            header('Location:index.php?action=getLogin&wrongPass=true');
        } else {
            $_SESSION['authorised'] = true;
            header('Location:index.php?action=getAdminViews');
        }    
    }
    
    public function getLogin(){
        require('view/frontend/login.php');
    }
}








