<?php
include 'backend/init.php';

if(Login::isLoggedIn()){
    $user_id=Login::isLoggedIn();

}else if(isset($_SESSION['userLoggedIn'])){
    $user_id=$_SESSION['userLoggedIn'];
}else{
    redirect_to(url_for("login"));
}
if(isset($_GET['username']) == true && empty($_GET['username']) === false){
    $username =h($_GET['username']);
    $profileId = $loadFromUser->userIdByUsername($username);
    if(empty($profileId)){
        redirect_to(url_for('profile'));
    }
}
else{
$profileId =$user_id;
}
$user=$loadFromUser->userData($user_id);
$profileData = $loadFromUser->userData($profileId);
$page_title="Post | Feed | LinkedIn";
$userProfileData=$loadFromUser->userProfileData($profileId);
$userProfileData=$loadFromUser->userProfileData($profileId);
if(isset($_GET['post'])){
     $postId=$_GET['post'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo url_for('frontend/assets/js/jquery-3.5.1.js'); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.js"></script>
    <link rel="shortcut icon" href="<?php echo url_for('frontend/assets/favicon/linkedIn.ico'); ?>">
    <link rel="stylesheet" href="<?php echo url_for('frontend/assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo url_for('frontend/assets/css/mainSite.css'); ?>">
    
</head>
<body>
    <div class="u_p_id" data-uid="<?php echo $user_id; ?>"  data-pid="<?php echo $profileId ?>"></div>
    <?php require_once "backend/shared/mainNav.php"; ?>
    <section class="authentication-outlet">
        <div class="feed-container-theme feed-outlet">
                <div class="neptune-grid three-column ghost-animate-in">
                     <section class="ad-banner-container is-header-zone ember-view"></section>
                     <aside class="left-rail" role="presentation">
                         <div class="feed-identity-module profile-rail-card ember-view update-post">
                                <div class="feed-identity-module__actor-meta profile-rail-card__actor-meta break-words">
                                    <div class=" feed-identity-module__default-bg profile-rail-card__default-bg feed-identity-module__member-bg-image profile-rail-card__member-bg-image" style="background-image:url(<?php echo url_for($profileData->profileCover); ?>)" alt="Background Image"></div>
                                    <a href="<?php echo url_for('in/'.$user->username); ?>" class="feed-link">
                                        <div class="identity_profile_photo">
                                            <img  src="<?php echo url_for($user->profilePic); ?>" alt="<?php echo $user->firstName." ".$user->lastName; ?>" class="feed-identity-module__member-photo profile-rail-card__member-photo EntityPhoto-circle-5 lazy-image ghost-person ember-view" style="background: #b3b6b9;">
                                        </div>
                                    </a>
                                    <div class="post__update-wrapper">
                                        <div class="profile-rail-card__actor-link t-16 t-black t-bold"><?php echo $user->firstName." ".$user->lastName; ?></div>
                                        <!-- <div>

                                        </div> -->
                                        <p class="profile-rail-card__description">
                                        <?php echo $userProfileData->shortBio; ?>
                                        </p>
                                        <a href="<?php echo url_for('in/'.$user->username); ?>" class="post__update-link mt-2">
                                        <div class="single-line-truncate t-16 t-black t-bold mt2">View full profile</div>
                                        </a>
                                        </div>
                                </div>
                               
                            
                         </div>
                     </aside>
                     <div class="core-rail" role="main">
                            
                            
                     </div>
                     <div class="right-rail">Right</div>
                </div>
        </div>
    </section>
  
    
    
</body>