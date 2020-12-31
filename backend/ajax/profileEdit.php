<?php
 require_once('../init.php');
 $loadFromUser->preventAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

 if(is_post_request()){
  
    if(isset($_POST['firstName']) && !empty($_POST['firstName'])){
        $userid=h($_POST['userId']);
        $fn=FormSanitizer::sanitizeFormString($_POST['firstName']);
        $ln=FormSanitizer::sanitizeFormString($_POST['lastName']);
        $country=FormSanitizer::sanitizeFormString($_POST['country']);
        $shortBio=FormSanitizer::SanitizerText($_POST['headline']);
        $education=FormSanitizer::SanitizerText($_POST['education']);
        $industry=h($_POST['industry']);
      
        $loadFromUser->update('users',$userid,['firstName'=>$fn,'lastName'=>$ln]);
        $loadFromUser->updateProfile('profile',$userid,['country'=>$country,'college'=>$education,'university'=>$education,'career_cat_id'=>$industry,'shortBio'=>$shortBio]);
      echo  $loadFromUser->getUsernameById($userid);
    }
      
    
      
 }  