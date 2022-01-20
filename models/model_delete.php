<?php
class model_delete extends Model
{
    public function delete()
    {
        if (array_key_exists('cmtID', $_POST))
        {
            $id = $_POST["cmtID"];
            
            $sql = 'delete from comments where cmtID='.$id;
        }
        else if (array_key_exists('imgID', $_POST))
        {
            $id = $_POST["imgID"];
            
            $sql = 'delete from images where imgID='.$id;
        }
        if ($id)
        {
            $dbConn = dbConnect();
            mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
        }
        ob_start();
        header('Location: /index.php');
        ob_end_flush();
        die();

    }
}
?>