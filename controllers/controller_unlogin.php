<?php
class controller_unlogin extends Controller { 
    function action_index() { 
        
    $this->view->generate('unlogin_view.php', 'template_view.php'); 
    } 
    }
?>