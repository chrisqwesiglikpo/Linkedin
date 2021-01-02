<?php
 require_once('../init.php');
 $loadFromUser->preventAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

 if(is_post_request()){
    
     if(isset($_POST['onlyStatusText']) && !empty($_POST['onlyStatusText'])){
      $userid=$_POST['userId'];
      $allowed_tags='<div><h1><h2><h3><h4><p><br/><strong><em><ul><li>';
      $statusText=strip_tags($_POST['onlyStatusText'],$allowed_tags);
   
     $lastId=$loadFromUser->create('post',array('userId'=>$userid,'post'=>$statusText,'postBy'=>$userid,'postedOn'=>date('Y-m-d H:i:s')));
   
      echo '<li class="artdeco-toast-item artdeco-toast-item--visibile">
      <div class="artdeco-toast-item__content-post">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="artdeco-toast-item__icon artdeco-toast-item__icon--success" width="24" height="24" focusable="false">
              <path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm-1.25 15L7 13.25l1.41-1.41L10.59 14l4.84-6H18z"></path>
          </svg>
          <p class="artdeco-toast-item__message" role="alert">
                  <span>Post successful.</span>
                  <a href="'.url_for('feed/update/urn:li:activity:'.$lastId.'/').'" class="artdeco-toast-item__cta">View</a>
          </p>
     </div>
     <button aria-label="Dismiss Post Success" class="btn-post-close__succ" id="btn-post-close__succ" type="button">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                 <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
          </svg>
     </button>
  </li>';
     }
      
     
      
 }  