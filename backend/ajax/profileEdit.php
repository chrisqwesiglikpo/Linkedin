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
      
    if(isset($_POST['userIdEd']) && !empty($_POST['userIdEd'])){
      $userid=h($_POST['userIdEd']);
      $webUrl=FormSanitizer::SanitizerText($_POST['webUrl']);
      $webType=h($_POST['webType']);
      $phoneNo=FormSanitizer::SanitizerText($_POST['phoneNo']);
      $phoneType=h($_POST['phoneType']);
      $address=FormSanitizer::SanitizerText($_POST['address']);
      $birthDay=h($_POST['birthday']);
      $birthMonth=h($_POST['birthmonth']);
      $birthYear=h($_POST['birthyear']);
      $birth = $birthDay.'-'.$birthMonth.'-'.$birthYear;

      
     $loadFromUser->updateProfile('profile',$userid,['birthday'=>$birth,'website'=>$webUrl,'websiteType'=>$webType,'phone'=>$phoneNo,'phoneType'=>$phoneType,'address'=>$address]);
    // echo  $loadFromUser->getUsernameById($userid);
    echo $birth;
  }
    
    
      
 }  