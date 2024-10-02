<?php
// require_once('chatgpt\chatgpt_class.php');
require_once(__DIR__ . '/chatgpt_class.php');
if(!isset($_POST['prompt'])) { 
    $chatgpt = new chatgpt();
    $chatgpt->display_chatbox();
}
?>