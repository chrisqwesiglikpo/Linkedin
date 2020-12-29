<?php
 include_once 'backend/init.php';
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
    // if(empty($profileId)){
    //     redirect_to(url_for('profile'));
    // }
}
else{
$profileId =$user_id;
}
$user=$loadFromUser->userData($user_id);
$profileData = $loadFromUser->userData($profileId);
 $page_title="Feed | LinkedIn"; 
?>
<?php require_once "backend/shared/mainHeader.php"; ?>
<body>
    <div class="u_p_id" data-uid="<?php echo $user_id; ?>"  data-pid="<?php echo $profileId ?>"></div>
    <?php require_once "backend/shared/mainNav.php"; ?>
    <script src="<?php echo url_for('frontend/assets/js/common.js'); ?>"></script>
</body>