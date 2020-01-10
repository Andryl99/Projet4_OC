<?php

require_once('model/Manager.php');

class CommentManager extends Manager
{

    //get all the comments to display
    public function getComments($postId)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id=? AND reported=0 ORDER BY date_creation DESC');

        $comments->execute(array($postId));
        return $comments;
    }
    
    //add a comment into the database
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();

        $addReq = $db->prepare('INSERT INTO comments(post_id, author, content, date_creation) VALUES(?, ?, ?, NOW())');
        $affectedLines = $addReq->execute(array($postId, $author, $comment));

        return $affectedLines;


    }
    
    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        
        $reportReq = $db->prepare('UPDATE comments SET reported=1 WHERE id=?');
        $reportedComment = $reportReq->execute(array($commentId));
        
        return $reportedComment;
        
    }
    
    public function adminDisplayReported()
    {
        
        $db = $this->dbConnect();
        
        $reportedComm = $db->query('SELECT id, author, content FROM comments WHERE reported=1');
        
        return $reportedComm;
    }
    
    public function adminDeleteComment($idComm)
    {
        
        $db = $this->dbConnect();
        
        $deletedCommReq = $db->prepare('DELETE FROM comments WHERE id=?');
        $deleteComm = $deletedCommReq->execute(array($idComm));
    }
    
    public function adminValidateComment($idComm)
    {
        
        $db = $this->dbConnect();
        
        $validateReq = $db->prepare('UPDATE comments SET reported=0 WHERE id=?');
        $validateComment = $validateReq->execute(array($idComm));
    }
}