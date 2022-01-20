<?php

class model_main extends Model
{
    public function getData()
    {
        $dbConn = dbConnect();
        $sql = "select * from images order by imgID";
        $result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
        $sql = "call GetComments()";
        $comments =  mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
        $comment = mysqli_fetch_assoc($comments);
        $htmlresult = "";
        while($row = mysqli_fetch_assoc($result))
        { 
            
        
            $htmlresult.='<div class="row div-image">';
            
            $htmlresult.='<div class="col ">';
            $htmlresult.='<img src="/data/'.$row['imgFileName'].'" width="100%"  alt="'.$row['imgFileName'].'"/>';
            $htmlresult.='</div>';

            $htmlresult.='<div class="col" width="20px">';
            if ($_SESSION['userId']==$row['imgUserID'])
            {
                $htmlresult.='<form action="/index.php?url=delete" method="post">';
                $htmlresult.='<input type="hidden" name="imgID" value="'.$row['imgID'].'" />';
                $htmlresult.='<button class="btn-ico" type="submit"><img src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-gradient-kiranshastry.png"/></button>';
                $htmlresult.='</form>';
            }
            $htmlresult.='</div>';
            
            $htmlresult.='</div>';
            while($comment && $comment['cmtImageID']==$row['imgID'])
            { 
                $htmlresult.='<div class="row">';
                $htmlresult.='<div class="col">';
                $htmlresult.='<span class="span-author">'.$comment['usrLogin'].'(</span>';
                $htmlresult.='<span class="span-time">'.$comment['cmtTimeStamp'].'</span>';
                $htmlresult.='<span class="span-author">):  </span>';
                $htmlresult.=$comment['cmtComment'];
                $htmlresult.='</div>';
                
                $htmlresult.='<div  class="col">';
                if ($_SESSION['userId']==$comment['cmtUserID'])
                {
                    $htmlresult.='<form action="/index.php?url=delete" method="post">';
                    $htmlresult.='<input type="hidden" name="cmtID" value="'.$comment['cmtID'].'" />';
                    $htmlresult.='<button class="btn-ico" type="submit"><img src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-gradient-kiranshastry.png"/></button>';
                    $htmlresult.='</form>';
                }
                $htmlresult.='</div>';
                               
                $htmlresult.='</div>';
                $comment = mysqli_fetch_assoc($comments);
            }
            if ($_SESSION['userId'])
            {
                
                $htmlresult.='<form class="form-add-comment" action="/index.php?url=addcomment" method="post"  name=form_add_comment"'.$row['imgID'].'">';
                $htmlresult.='<input class="input-add-comment form-control " type="text" name="comment" value="" />';
                $htmlresult.='<input type="hidden" name="imgID" value="'.$row['imgID'].'" />';
                $htmlresult.='<button class = "btn btn-primary" type="submit">Комментировать</button>';
                $htmlresult.='</form>';
            }
            
        }   
        return $htmlresult;
    }

}
