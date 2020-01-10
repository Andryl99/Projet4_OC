<?php

require_once('model/Manager.php');

class PostManager extends Manager
{
    //gathering the 5 latest posts to display on the main page
    public function getPosts()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY date_creation DESC LIMIT 0, 5');

        return $req;
    }
    
    //gathering ALL the posts to display on the admin interface
    
    public function getAdminPosts()
    {
        
        $db = $this->dbConnect();
        
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY date_creation DESC');
        
        return $req;
    }
    
    //get only one post nb $postId to display full screen with comments
    public function getPost($postId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id=?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
    public function adminAddPost($title, $content)
    {
        $db = $this->dbConnect();
        
        $addReq = $db->prepare('INSERT INTO posts(title, content, date_creation) VALUES(:title, :content, NOW())');
        $addReq->execute(array(
            'title' => $title,
            'content' => $content));
    }
    
    public function adminDeletePost($id)
    {
        $db = $this->dbConnect();
        
        $delReq = $db->prepare('DELETE FROM posts WHERE id=?');
        $delReq->execute(array($id));
    }
    
    public function adminUpdatePost($idPost, $newContent)
    {
        $db = $this->dbConnect();
        
        $updateReq = $db->prepare('UPDATE posts SET content=? WHERE id=?');
        $updateReq->execute(array($newContent, $idPost));
    }
}