<?php
class model_addcomment extends Model
{
    public function addcomment()
    {
        
        $imgId = $_POST["imgID"];
        $comment = $_POST["comment"];
        $dbConn = dbConnect();
        $sql = "insert  comments (cmtUserID, cmtImageID, cmtComment) select ".$_SESSION['userId'].",".$imgId.",'".$comment."'";
        
        mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
        ob_start();
        header('Location: /index.php');
        ob_end_flush();
        die();
    }
}
?>