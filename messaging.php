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
    if(empty($profileId)){
        redirect_to(url_for('profile'));
    }
}
else{
$profileId =$user_id;
}
$user=$loadFromUser->userData($user_id);
$profileData = $loadFromUser->userData($profileId);
 $page_title="Messaging | LinkedIn"; 
?>
<?php require_once "backend/shared/mainHeader.php"; ?>
<body>
    <div class="u_p_id" data-uid="<?php echo $user_id; ?>"  data-pid="<?php echo $profileId ?>"></div>
    <header id="global-nav" class="global-nav">
        <div class="global-nav__content">
            <div class="top-left-part">
                <h1 class="global-nav__branding">
                        <a href="<?php echo url_for('feed/'); ?>" class="site-logo">
                            <img src="<?php echo url_for('frontend/assets/images/brand.svg'); ?>" alt="Site Logo" title="LinkedIn">
                        </a>
                </h1>
                <div class="global-nav__search">
                        <input type="text" name="main-search" class="search-global" id="search-global" placeholder="Search" role="combobox" aria-label="Search">
                        <div class="s-icon">
                            <img src="<?php echo url_for('frontend/assets/images/search.svg'); ?>" alt="Search Icon">
                        </div>
                </div>
                <div id="search-show">
                    <div class="search-result"></div>
                </div>
            </div>
            <nav class="global-nav__nav">
                <ul class="global-nav__primary-items">
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('feed/'); ?>" class="global-nav__primary-link ember-view">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                          <path d="M23 9v2h-2v7a3 3 0 01-3 3h-4v-6h-4v6H6a3 3 0 01-3-3v-7H1V9l11-7z"/>
                        </svg>
                                 <span class="global-nav__primary-link-text">Home</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('mynetwork/'); ?>" class="global-nav__primary-link ember-view">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                           <path d="M12 16v6H3v-6a3 3 0 013-3h3a3 3 0 013 3zm5.5-3A3.5 3.5 0 1014 9.5a3.5 3.5 0 003.5 3.5zm1 2h-2a2.5 2.5 0 00-2.5 2.5V22h7v-4.5a2.5 2.5 0 00-2.5-2.5zM7.5 2A4.5 4.5 0 1012 6.5 4.49 4.49 0 007.5 2z"/>
                        </svg>
                        <span class="global-nav__primary-link-text">My Network</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('jobs/'); ?>" class="global-nav__primary-link ember-view">
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                                  <path d="M17 6V5a3 3 0 00-3-3h-4a3 3 0 00-3 3v1H2v4a3 3 0 003 3h14a3 3 0 003-3V6zM9 5a1 1 0 011-1h4a1 1 0 011 1v1H9zm10 9a4 4 0 003-1.38V17a3 3 0 01-3 3H5a3 3 0 01-3-3v-4.38A4 4 0 005 14z"/>
                                </svg>
                                 <span class="global-nav__primary-link-text">Jobs</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('messaging/thread/new/'); ?>" class="global-nav__primary-link ember-view active">
                            <svg id="global-nav-icon--mercado__messaging--active" class="nav-icon" height="24" width="24">
                                <path clip-rule="evenodd" d="m11.99 2.00003h3.996c.7888-.00263 1.5704.15062 2.3.45097.7295.30035 1.3926.74189 1.9513 1.29931.5587.55741 1.0021 1.21973 1.3045 1.94899.3025.72926.4582 1.51112.4582 2.30073v.48c-.0007.99073-.2465 1.96587-.7154 2.83837-.469.8724-1.1464 1.6151-1.9719 2.1616l-.3297.22c-.0773-1.804-.848-3.5083-2.1512-4.75689-1.3032-1.24856-3.0379-1.94474-4.8418-1.94308h-3.99599c-.65929.00095-1.31514.09522-1.94805.28.17568-1.45488.87721-2.79509 1.97223-3.76778s2.50781-1.51059 3.97181-1.51222zm-3.996 6h3.996c1.5897 0 3.1143.63214 4.2384 1.75736 1.1241 1.12521 1.7556 2.65131 1.7556 4.24261v.48c-.0007.9908-.2465 1.9659-.7154 2.8383-.4689.8725-1.1464 1.6152-1.9719 2.1617l-5.30469 3.52v-3h-1.99801c-1.5897 0-3.1143-.6321-4.2384-1.7573-1.12409-1.1252-1.7556-2.6514-1.7556-4.2427s.63151-3.1174 1.7556-4.24261c1.1241-1.12522 2.6487-1.75736 4.2384-1.75736zm-1.55401 6.83147c.16428.1099.35743.1685.55501.1685.26496 0 .51905-.1053.7064-.2929.18735-.1875.2926-.4419.2926-.7071 0-.1978-.05859-.3911-.16836-.5555-.10977-.1645-.26579-.2927-.44833-.3683-.18255-.0757-.38341-.0955-.5772-.057-.19379.0386-.37179.1339-.51151.2737-.13971.1399-.23485.3181-.2734.512-.03855.194-.01876.3951.05685.5778s.20365.3389.36794.4488zm2.997 0c.16429.1099.35743.1685.55502.1685.26499 0 .51909-.1053.70639-.2929.1874-.1875.2926-.4419.2926-.7071 0-.1978-.0586-.3911-.1684-.5555-.1097-.1645-.2657-.2927-.4483-.3683-.1825-.0757-.3834-.0955-.57719-.057-.19379.0386-.37179.1339-.5115.2737-.13972.1399-.23486.3181-.27341.512-.03855.194-.01876.3951.05685.5778s.20366.3389.36794.4488zm2.99701 0c.1643.1099.3574.1685.555.1685.265 0 .5191-.1053.7064-.2929.1874-.1875.2926-.4419.2926-.7071 0-.1978-.0586-.3911-.1684-.5555-.1097-.1645-.2657-.2927-.4483-.3683-.1825-.0757-.3834-.0955-.5772-.057-.1938.0386-.3718.1339-.5115.2737-.1397.1399-.2349.3181-.2734.512-.0385.194-.0188.3951.0569.5778.0756.1827.2036.3389.3679.4488z"></path>
                            </svg>
                            <span class="global-nav__primary-link-text">Messaging</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('notifications/'); ?>" class="global-nav__primary-link ember-view">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                               <path d="M22 19h-8.28a2 2 0 11-3.44 0H2v-1a4.52 4.52 0 011.17-2.83l1-1.17h15.7l1 1.17A4.42 4.42 0 0122 18zM18.21 7.44A6.27 6.27 0 0012 2a6.27 6.27 0 00-6.21 5.44L5 13h14z"/>
                            </svg>
                            <span class="global-nav__primary-link-text">Notifications</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <button type="button" class="global-nav__me-wrapper global-nav__primary-link">
                            <img src="<?php echo url_for($user->profilePic); ?>" alt="<?php echo $user->firstName." ".$user->lastName; ?>" width="24px" height="24px" class="global-nav__me-photo">
                            <span class="global-nav__primary-link-text"> Me
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                                     <path d="M1 5l7 4.61L15 5v2.39L8 12 1 7.39z"/>
                                </svg>
                            </span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    
    </header>
    <script src="<?php echo url_for('frontend/assets/js/common.js'); ?>"></script>
</body>