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
<?php require_once "backend/shared/mainHeader.php"; ?>
<body>
    <div class="u_p_id" data-uid="<?php echo $user_id; ?>"  data-pid="<?php echo $profileId ?>"></div>
    <header id="global-nav" class="global-nav">
        <div class="global-nav__content">
            <div class="top-left-part">
                <h1 class="global-nav__branding">
                        <a href="<?php echo url_for('home'); ?>" class="site-logo">
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
                        <a href="<?php echo url_for('feed'); ?>" class="global-nav__primary-link ember-view">
                                 <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg"><path d="M22,9.45,12.85,3.26A1.52,1.52,0,0,0,12,3a1.49,1.49,0,0,0-.84.26L2,9.45,3.06,11,4,10.37V20a1,1,0,0,0,1,1h5V16h4v5h5a1,1,0,0,0,1-1V10.37l.94.63Z" class="active-item" style="fill-opacity: 1"/><path d="M22,9.45L12.85,3.26a1.5,1.5,0,0,0-1.69,0L2,9.45,3.06,11,4,10.37V20a1,1,0,0,0,1,1h6V16h2v5h6a1,1,0,0,0,1-1V10.37L20.94,11ZM18,19H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v4H6V8.89l6-4,6,4V19Z" class="inactive-item" style="fill: currentColor"/></svg>
                                 <span class="global-nav__primary-link-text">Home</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('mynetwork'); ?>" class="global-nav__primary-link ember-view">
                                <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg"><path d="M16,17.85V20a1,1,0,0,1-1,1H1a1,1,0,0,1-1-1V17.85a4,4,0,0,1,2.55-3.73l2.95-1.2V11.71l-0.73-1.3A6,6,0,0,1,4,7.47V6a4,4,0,0,1,4.39-4A4.12,4.12,0,0,1,12,6.21V7.47a6,6,0,0,1-.77,2.94l-0.73,1.3v1.21l2.95,1.2A4,4,0,0,1,16,17.85Zm4.75-3.65L19,13.53v-1a6,6,0,0,0,1-3.31V9a3,3,0,0,0-6,0V9.18a6,6,0,0,0,.61,2.58A3.61,3.61,0,0,0,16,13a3.62,3.62,0,0,1,2,3.24V21h4a1,1,0,0,0,1-1V17.47A3.5,3.5,0,0,0,20.75,14.2Z" class="active-item" style="fill-opacity: 1"/><path d="M20.74,14.2L19,13.54V12.86l0.25-.41A5,5,0,0,0,20,9.82V9a3,3,0,0,0-6,0V9.82a5,5,0,0,0,.75,2.63L15,12.86v0.68l-1,.37a4,4,0,0,0-.58-0.28l-2.45-1V10.83A8,8,0,0,0,12,7V6A4,4,0,0,0,4,6V7a8,8,0,0,0,1,3.86v1.84l-2.45,1A4,4,0,0,0,0,17.35V20a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V17.47A3.5,3.5,0,0,0,20.74,14.2ZM16,8.75a1,1,0,0,1,2,0v1.44a3,3,0,0,1-.38,1.46l-0.33.6a0.25,0.25,0,0,1-.22.13H16.93a0.25,0.25,0,0,1-.22-0.13l-0.33-.6A3,3,0,0,1,16,10.19V8.75ZM6,5.85a2,2,0,0,1,4,0V7.28a6,6,0,0,1-.71,2.83L9,10.72a1,1,0,0,1-.88.53H7.92A1,1,0,0,1,7,10.72l-0.33-.61A6,6,0,0,1,6,7.28V5.85ZM14,19H2V17.25a2,2,0,0,1,1.26-1.86L7,13.92v-1a3,3,0,0,0,1,.18H8a3,3,0,0,0,1-.18v1l3.72,1.42A2,2,0,0,1,14,17.21V19Zm7,0H16V17.35a4,4,0,0,0-.55-2l1.05-.4V14.07a2,2,0,0,0,.4.05h0.2a2,2,0,0,0,.4-0.05v0.88l2.53,1a1.5,1.5,0,0,1,1,1.4V19Z" class="inactive-item" style="fill: currentColor"/></svg>
                                 <span class="global-nav__primary-link-text">My Network</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('jobs'); ?>" class="global-nav__primary-link ember-view">
                                 <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg"><path d="M2,13H22v6a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V13ZM22,8v4H2V8A1,1,0,0,1,3,7H7V6a3,3,0,0,1,3-3h4a3,3,0,0,1,3,3V7h4A1,1,0,0,1,22,8ZM15,6a1,1,0,0,0-1-1H10A1,1,0,0,0,9,6V7h6V6Z" class="active-item" style="fill-opacity: 1"/><path d="M21,7H17V6a3,3,0,0,0-3-3H10A3,3,0,0,0,7,6V7H3A1,1,0,0,0,2,8V19a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V8A1,1,0,0,0,21,7ZM9,6a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1V7H9V6ZM20,18H4V13H20v5Zm0-6H4V9H20v3Z" class="inactive-item" style="fill: currentColor"/></svg>
                                 <span class="global-nav__primary-link-text">Jobs</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('messaging'); ?>" class="global-nav__primary-link ember-view">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 12.64 13.64"><defs><style>.cls-1{fill:#1a2947;}</style></defs><title>message</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M6.32,0A6.32,6.32,0,0,0,1.94,10.87c.34.33-.32,2.51.09,2.75s1.79-1.48,2.21-1.33a6.22,6.22,0,0,0,2.08.35A6.32,6.32,0,0,0,6.32,0Zm.21,8.08L5.72,6.74l-2.43,1,2.4-3,.84,1.53,2.82-.71Z"/></g></g></svg>
                            <span class="global-nav__primary-link-text">Messaging</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('notifications'); ?>" class="global-nav__primary-link ember-view">
                            <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg"><path d="M18.94,14H5.06L5.79,8.44A6.26,6.26,0,0,1,12,3h0a6.26,6.26,0,0,1,6.21,5.44Zm2,5-1.71-4H4.78L3.06,19a0.71,0.71,0,0,0-.06.28,0.75,0.75,0,0,0,.75.76H10a2,2,0,1,0,4,0h6.27A0.74,0.74,0,0,0,20.94,19Z" class="active-item" style="fill-opacity: 1"/><path d="M20.94,19L19,14.49s-0.41-3.06-.8-6.06A6.26,6.26,0,0,0,12,3h0A6.26,6.26,0,0,0,5.79,8.44L5,14.49,3.06,19a0.71,0.71,0,0,0-.06.28,0.75,0.75,0,0,0,.75.76H10a2,2,0,1,0,4,0h6.27A0.74,0.74,0,0,0,20.94,19ZM12,4.75h0a4.39,4.39,0,0,1,4.35,3.81c0.28,2.1.56,4.35,0.7,5.44H7L7.65,8.56A4.39,4.39,0,0,1,12,4.75ZM5.52,18l1.3-3H17.18l1.3,3h-13Z" class="inactive-item" style="fill: currentColor"/></svg>
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
    <main class="core-rail">
        <div class="main-area">
                <div class="profile-left-wrap">
                    <div class="profile-cover-wrap" style="background-image:url(<?php echo url_for($profileData->profileCover); ?>)">
                        <div class="upload-cov-opt-wrap">
                        <?php if($profileId ==$user_id){ ?>
                                <div class="add-cover-photo" id="cover-photo">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="#0a66c2;" width="16" height="16" focusable="false">
                                    <path d="M14 4h-1.75l-1-2h-6.5l-1 2H2a1 1 0 00-1 1v7a1 1 0 001 1h12a1 1 0 001-1V5a1 1 0 00-1-1zm-1 7H3V8h2a3 3 0 006 0h2v3zm-2.87-3A2.13 2.13 0 118 5.88 2.13 2.13 0 0110.13 8zM13 7h-2.18a3 3 0 00-5.64 0H3V6h2l1-2h4l1 2h2v1z" fill="#0a66c2;"></path>
                                </svg>
                                </div>
                            <?php }else{ ?>
                            <div class="dont-add-cover-photo">
                            
                            </div>
                            <?php } ?>
                            
                            
                        </div>
                    </div>
                </div>
                <aside class="profile-right-wrap"></aside>
        </div>
    </main>
    <div class="modal" id="modal">
        <div class="artdeco-modal" role="dialog" aria-labelledby="profile-topcard-background-image-education-header">
                <div class="header__topcard">
                    <h2 id="profile-topcard-background-image-education-header">
                        Add background photo
                    </h2>
                    <button aria-label="Dismiss" class="artdeco-modal__dismiss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                           <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                        </svg>
                    </button>
                </div>
                <div class="modal-body__topcard">
                        <div class="modal-body__topcard-container">
                           <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="230" height="230" viewBox="0 0 230 140" data-supported-dps="230x230">
                                    <defs>
                                        <clipPath id="add-media-clip-path">
                                        <path transform="rotate(-15 71.008 69.736)" fill="none" d="M48.33 46.03h46v48h-46z"/>
                                        </clipPath>
                                        <style>
                                        .cls-2{fill:#9bdaf3}.cls-3{fill:#00a0dc}.cls-6{fill:#005e93}
                                        </style>
                                    </defs>
                                    <path class="cls-2" d="M141.67 40.9l-10.14 37.84a19.88 19.88 0 013.41 10l38.74 10.38 12.42-46.31zM97.77 79.87l-10.44-39L42.9 52.81l12.42 46.36 39.75-10.65a19.85 19.85 0 012.7-8.65z"/>
                                    <circle class="cls-3" cx="77.95" cy="59.98" r="4" transform="rotate(-15 77.954 59.989)"/>
                                    <g clip-path="url(#add-media-clip-path)">
                                        <path d="M49.25 84.23l10-14.85A2 2 0 0162 68.8l16.6 10.27a2 2 0 002.7-.57l3-4.44a2 2 0 012.72-.56l13.33 8.42" stroke="#00a0dc" stroke-miterlimit="10" stroke-width="3" fill="none"/>
                                    </g>
                                    <path class="cls-3" d="M158.08 73.21a5 5 0 002.29 4l7.28 4.69a5 5 0 012 5.38L169 89.6l-30.91-8.28.61-2.32a5 5 0 014.38-3.69l8.65-.42a5 5 0 004-2.35m5.82-1.54l-7.73-2-.4 1.49a2 2 0 01-1.84 1.48l-8.71.42a8 8 0 00-7.08 5.9l-1.39 5.18 36.71 9.84 1.39-5.18a8 8 0 00-3.18-8.65L162 74.72a2 2 0 01-.85-2.2l.4-1.49z"/>
                                    <path class="cls-3" d="M160.26 54.34a6 6 0 011.56.21 6 6 0 014.24 7.35l-.47 1.76a9 9 0 01-1.37 2.9l-1.29 1.8a3 3 0 01-3.22 1.15l-3.56-1A3 3 0 01154 66l-.21-2.2a9 9 0 01.26-3.2l.47-1.76a6 6 0 015.79-4.45m0-3a9 9 0 00-8.73 6.61l-.47 1.76a12 12 0 00-.35 4.27l.21 2.2a6 6 0 004.42 5.21l3.56 1a6 6 0 006.43-2.31l1.29-1.8a12 12 0 001.83-3.87l.5-1.79a9 9 0 00-6.36-11 9 9 0 00-2.34-.31z"/>
                                    <path class="cls-6" d="M115 73a17 17 0 11-17 17 17 17 0 0117-17m0-3a20 20 0 1020 20 20 20 0 00-20-20z"/>
                                    <path class="cls-6" d="M191.52 48l-52.16-14a2 2 0 00-2.45 1.41l-10.26 38.36a20.1 20.1 0 012.53 2.14l10.36-38.68 50.23 13.46-14 52.16-40.89-11a19.86 19.86 0 01-.52 3L176 106a2 2 0 002.45-1.41l14.49-54.09a2 2 0 00-1.42-2.5zM95.08 91.62L53.2 102.84l-14-52.16 50.25-13.45L100 76.75a20.09 20.09 0 012.47-2.36L92.09 35.48a2 2 0 00-2.45-1.41L37.48 48a2 2 0 00-1.41 2.45l14.49 54.09A2 2 0 0053 106l42.55-11.4a19.92 19.92 0 01-.47-2.98z"/>
                                    <path class="cls-3" d="M124 88h-7v-7h-4v7h-7v4h7v7h4v-7h7v-4z"/>
                            </svg>
                        </div>
                        <h3 class="education-paragraph t-20 t-normal text-align-center mt5 mb2">
                             Showcase your personality, interests, team moments or notable milestones
                        </h3>
                        <p class="education-paragraph t-14 t-black--light t-normal mb3"> A good background photo will help you stand out
                                <a tabindex="0" data-control-name="background_image_help" rel="noopener noreferrer" target="_blank" href="https://www.linkedin.com/help/linkedin/answer/120013" id="ember758" class="link-without-visited-state ember-view">Learn more</a>    
                        </p>
                </div>
                <div class="modal__footer-topcard">
                    <button data-control-name="background_image_education_upload" id="ember760" class="relative artdeco-button artdeco-button--2 artdeco-button--primary ember-view"><!---->
                        <span class="artdeco-button__text">
                             <label for="uploadCoverPhoto"> Upload photo</label>
                            <input aria-label="Upload photo" id="uploadCoverPhoto" class="profile-topcard-background-image-edit__input" accept="image/*" type="file">
                        </span>
                    </button>
                </div>
        </div>
        <div class="artdeco-modal-step" role="dialog" aria-labelledby="profile-topcard-background-image-education-header">
                <div class="header__topcard">
                    <h2 id="profile-topcard-background-image-education-header">
                        Background Photo
                    </h2>
                    <button aria-label="Dismiss" class="artdeco-modal__dismiss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                           <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                        </svg>
                    </button>
                </div>
                <div class="modal-body__topcard">
                        <div class="imagePreviewContainer" id="imagePreviewContainer" style="height: 297px; width: 716px;">
                                <img src="" alt="" id="imagePreview" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                        <!-- <div class="modal-body__topcard-container">
                           <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="230" height="230" viewBox="0 0 230 140" data-supported-dps="230x230">
                                    <defs>
                                        <clipPath id="add-media-clip-path">
                                        <path transform="rotate(-15 71.008 69.736)" fill="none" d="M48.33 46.03h46v48h-46z"/>
                                        </clipPath>
                                        <style>
                                        .cls-2{fill:#9bdaf3}.cls-3{fill:#00a0dc}.cls-6{fill:#005e93}
                                        </style>
                                    </defs>
                                    <path class="cls-2" d="M141.67 40.9l-10.14 37.84a19.88 19.88 0 013.41 10l38.74 10.38 12.42-46.31zM97.77 79.87l-10.44-39L42.9 52.81l12.42 46.36 39.75-10.65a19.85 19.85 0 012.7-8.65z"/>
                                    <circle class="cls-3" cx="77.95" cy="59.98" r="4" transform="rotate(-15 77.954 59.989)"/>
                                    <g clip-path="url(#add-media-clip-path)">
                                        <path d="M49.25 84.23l10-14.85A2 2 0 0162 68.8l16.6 10.27a2 2 0 002.7-.57l3-4.44a2 2 0 012.72-.56l13.33 8.42" stroke="#00a0dc" stroke-miterlimit="10" stroke-width="3" fill="none"/>
                                    </g>
                                    <path class="cls-3" d="M158.08 73.21a5 5 0 002.29 4l7.28 4.69a5 5 0 012 5.38L169 89.6l-30.91-8.28.61-2.32a5 5 0 014.38-3.69l8.65-.42a5 5 0 004-2.35m5.82-1.54l-7.73-2-.4 1.49a2 2 0 01-1.84 1.48l-8.71.42a8 8 0 00-7.08 5.9l-1.39 5.18 36.71 9.84 1.39-5.18a8 8 0 00-3.18-8.65L162 74.72a2 2 0 01-.85-2.2l.4-1.49z"/>
                                    <path class="cls-3" d="M160.26 54.34a6 6 0 011.56.21 6 6 0 014.24 7.35l-.47 1.76a9 9 0 01-1.37 2.9l-1.29 1.8a3 3 0 01-3.22 1.15l-3.56-1A3 3 0 01154 66l-.21-2.2a9 9 0 01.26-3.2l.47-1.76a6 6 0 015.79-4.45m0-3a9 9 0 00-8.73 6.61l-.47 1.76a12 12 0 00-.35 4.27l.21 2.2a6 6 0 004.42 5.21l3.56 1a6 6 0 006.43-2.31l1.29-1.8a12 12 0 001.83-3.87l.5-1.79a9 9 0 00-6.36-11 9 9 0 00-2.34-.31z"/>
                                    <path class="cls-6" d="M115 73a17 17 0 11-17 17 17 17 0 0117-17m0-3a20 20 0 1020 20 20 20 0 00-20-20z"/>
                                    <path class="cls-6" d="M191.52 48l-52.16-14a2 2 0 00-2.45 1.41l-10.26 38.36a20.1 20.1 0 012.53 2.14l10.36-38.68 50.23 13.46-14 52.16-40.89-11a19.86 19.86 0 01-.52 3L176 106a2 2 0 002.45-1.41l14.49-54.09a2 2 0 00-1.42-2.5zM95.08 91.62L53.2 102.84l-14-52.16 50.25-13.45L100 76.75a20.09 20.09 0 012.47-2.36L92.09 35.48a2 2 0 00-2.45-1.41L37.48 48a2 2 0 00-1.41 2.45l14.49 54.09A2 2 0 0053 106l42.55-11.4a19.92 19.92 0 01-.47-2.98z"/>
                                    <path class="cls-3" d="M124 88h-7v-7h-4v7h-7v4h7v7h4v-7h7v-4z"/>
                            </svg>
                        </div> -->
                        <!-- <h3 class="education-paragraph t-20 t-normal text-align-center mt5 mb2">
                             Showcase your personality, interests, team moments or notable milestones
                        </h3>
                        <p class="education-paragraph t-14 t-black--light t-normal mb3"> A good background photo will help you stand out
                                <a tabindex="0" data-control-name="background_image_help" rel="noopener noreferrer" target="_blank" href="https://www.linkedin.com/help/linkedin/answer/120013" id="ember758" class="link-without-visited-state ember-view">Learn more</a>    
                        </p> -->
                </div>
                <div class="modal__footer-topcard">
                    <button data-control-name="background_image_education_upload" id="ember760" class="relative artdeco-button artdeco-button--2 artdeco-button--primary ember-view imageUploadButton"><!---->
                        <span class="artdeco-button__text">
                             Apply
                           
                        </span>
                    </button>
                </div>
        </div>
    </div>
    <script src="<?php echo url_for('frontend/assets/js/profile.js');?>"></script>
</body>