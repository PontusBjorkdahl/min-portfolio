<?php
require_once('chatgpt_class.php');
if(isset($_POST['prompt'])) {
  $prompt = $_POST['prompt'];
  $chatgpt = new chatgpt();
  echo $chatgpt->ask($prompt);
}
?>