<?php
class model_upload extends Model
{
    
    public function uploadImage()
    {
        $errors = array();
        for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
 
            $fileName = $_FILES['files']['name'][$i];

            if ($_FILES['files']['size'][$i] > UPLOAD_MAX_SIZE) {
                $errors[] = 'Недопустимый размер файла ' . $fileName;
                continue;
            }

            if (!in_array($_FILES['files']['type'][$i], ALLOWED_TYPES)) {
                $errors[] = 'Недопустимый формат файла ' . $fileName;
                continue;
            }
            $path_parts = pathinfo($fileName);
            $newFileName = getGuid().'.'. $path_parts["extension"];
            $filePath= UPLOAD_DIR.'/'.$newFileName;

            if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
                $errors[] = 'Ошибка загрузки файла ' . $fileName;
                continue;
            }

            $dbConn = dbConnect();
                        
            $sql = "insert into images(imgFileName, imgUserID) values('".$newFileName."',".$_SESSION['userId'].")";

            $result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
            if(!$result) {
                $errors[] = 'Ошибка загрузки файла ' . $fileName;
                continue;
            }

        }    
        return $errors;
    }
}
?>