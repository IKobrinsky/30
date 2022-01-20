<?php
require_once getcwd().'..\config\config.php';


function getGuid()
{
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function dbConnect()
{
    static $db=null;
    if ($db==null)
    {
        
        $db =  mysqli_connect(DB_SERVER_NAME, DB_LOGIN, DB_PASSWORD, DB_DATABASE_NAME, DB_PORT) or die('MySQL connect failed. ' . mysqli_connect_error());
    }
    return $db;
}

function appendFile(string $fileName, array $strings)
{
    $file=fopen($fileName,'a+') or die("Unable to open file!");
    fwrite($file, implode(PHP_EOL, $strings));
    fclose($file);
}

?>