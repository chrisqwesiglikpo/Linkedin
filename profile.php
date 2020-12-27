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
}
else{
$profileId =$user_id;
}
$user=$loadFromUser->userData($user_id);
$profileData = $loadFromUser->userData($profileId);
$page_title=$profileData->firstName." ".$profileData->lastName ." | LinkedIn";
?>
<?php require_once "backend/shared/loginHeader.php"; ?>
<body>
    <header></header>
</body>