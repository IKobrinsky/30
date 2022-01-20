<?php
session_start();
require_once 'core/model.php'; 
require_once 'core/view.php'; 
require_once 'core/controller.php'; 
require_once 'route.php'; 
require_once getcwd().'/config/utils.php';
Route::start(); 
if (!array_key_exists('userId', $_SESSION))
    $_SESSION['userId'] ='';
?>