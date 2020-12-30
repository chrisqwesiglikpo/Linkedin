<?php
 require_once('../init.php');
 $loadFromUser->preventAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

 if(is_post_request()){
    // var_dump($_FILES['croppedImage']);
     if(isset($_POST['userId']) && !empty($_POST['userId'])){
      $userid=$_POST['userId'];
      $username=$loadFromUser->getUsernameById($userid);
      echo $username;
      
     }
      
     
      
 }  