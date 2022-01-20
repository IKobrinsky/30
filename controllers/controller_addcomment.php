<?php
class controller_addcomment extends Controller { 
function action_index() { 
    
$this->view->generate('addcomment_view.php', 'template_view.php'); 
} 
}
?>