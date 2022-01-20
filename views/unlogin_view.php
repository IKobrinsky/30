<?php
        $_SESSION['userId']="";
        ob_start();
        header('Location: /index.php');
        ob_end_flush();
        die();
?>