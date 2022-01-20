<?php

class model_login extends Model
{
    public function login()
    {
        $errors=array();
        if ( strlen($_POST['name']==0))
        {
            $errors[]='Не указан логин';
            
        }
        
        if (empty($errors))
        {
            
            $dbConn = dbConnect();
            $sql = "call CheckUser('".$_POST["name"]."','".md5(md5($_POST["password"]))."')";
            $result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
            $row = mysqli_fetch_assoc($result);
            if (!$row)
            {
                $errors[]='Пользователь не найден или неправильный пароль';
            }
            else
            {
                $_SESSION['userId'] =$row['usrID'];
            }

        }
        
        return $errors;
    }
}
?>