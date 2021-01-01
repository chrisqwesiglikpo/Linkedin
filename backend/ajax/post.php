<?php
 require_once('../init.php');
 $loadFromUser->preventAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

 if(is_post_request()){
    
     if(isset($_POST['onlyStatusText']) && !empty($_POST['onlyStatusText'])){
      $userid=$_POST['userId'];
      $allowed_tags='<div><h1><h2><h3><h4><p><br/><strong><em><ul><li>';
      $statusText=strip_tags($_POST['onlyStatusText'],$allowed_tags);
   
     $lastId=$loadFromUser->create('post',array('userId'=>$userid,'post'=>$statusText,'postBy'=>$userid,'postedOn'=>date('Y-m-d H:i:s')));
      
     }
      
     
      
 }  