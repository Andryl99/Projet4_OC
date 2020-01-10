<?php 


require_once('model/frontend/PostManager.php');


class BackendController
{

    
    public function adminListPosts()
    {
        $postManager = new PostManager(); 
        $posts = $postManager->getAdminPosts();

        require('view/backend/adminPostView.php');
    }
    
    public function adminAddPost($title, $content)
    {
    
        $postManagerAdd = new PostManager();
        $newPost = $postManagerAdd->adminAddPost($title, $content);

        if($newPost === false) {
            throw new Exception("Impossible d'ajouter l'article");
        } else
        {
            header('Location:index.php?action=adminPosts');
        }
    }
        
    public function adminDeletePost($id)
    {
    
        $postManagerDelete = new PostManager();
        $deletedPost = $postManagerDelete->adminDeletePost($id);

        if($deletedPost === false){
            throw new Exception("Impossible de supprimer l'article");
        } else
        {
            header('Location:index.php?action=adminPosts');
        }
    }
        
    public function adminUpdatePost($id, $content)
    {
    
        $postManagerUpdate = new PostManager();
        $updatedPost = $postManagerUpdate->adminUpdatePost($id, $content);

        if($updatedPost === false){
            throw new Exception("Impossible de modifier cet article");
        } else
        {
            header('Location:index.php?action=adminPosts');
        }
    }
        
    public function adminGetViews()
    {
        require('view/backend/adminView.php');
    }

    public function adminGetUpdateForm($id)
    {
        require('view/backend/adminUpdatePost.php');
    }

    public function adminDisplayReported()
    {
        $commentManager = new CommentManager();
        $reportedComm = $commentManager->adminDisplayReported();

        require('view/backend/commentBackView.php');
    }
        
    public function adminDeleteComm($idComm){
    
        $commentManager = new CommentManager();
        $deletedComm = $commentManager->adminDeleteComment($idComm);

        if($deletedComm === false){
            throw new Exception("Impossible de supprimer ce commentaire");
        } else
        {
            header('Location:index.php?action=adminDisplayReported');
        }
    }

    public function adminValidateComm($idComm){

        $commentManager = new CommentManager();
        $validateComm = $commentManager->adminValidateComment($idComm);

        if($validateComm === false){
            throw new Exception("Impossible de valider ce commentaire");
        }else
        {
            header('Location:index.php?action=adminDisplayReported');
        }
    }
        
        
    
}