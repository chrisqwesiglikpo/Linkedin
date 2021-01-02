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

if(!isset($page_title)){
    $page_title="Feed | LinkedIn";
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
                        <div class="global-nav__primary-link-notif">
                               <span class="nofication-badge ">
                                    <span class="notification-badge__no-count"></span>
                                </span>
                                <svg id="global-nav-icon--mercado__home--active" class="nav-icon"  height="24" width="24">
                                    <path d="m23 9v2h-2v7c0 1.7-1.3 3-3 3h-4v-6h-4v6h-4c-1.7 0-3-1.3-3-3v-7h-2v-2l11-7z"></path>
                                    <path d="m20 2h-3v3.2l3 1.9z"></path>
                                </svg>
                        </div>
       
                                 <span class="global-nav__primary-link-text">Home</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('mynetwork/'); ?>" class="global-nav__primary-link ember-view">
                        <div class="global-nav__primary-link-notif">
                               <span class="nofication-badge ">
                                    <span class="notification-badge__count"></span>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                                  <path d="M12 16v6H3v-6a3 3 0 013-3h3a3 3 0 013 3zm5.5-3A3.5 3.5 0 1014 9.5a3.5 3.5 0 003.5 3.5zm1 2h-2a2.5 2.5 0 00-2.5 2.5V22h7v-4.5a2.5 2.5 0 00-2.5-2.5zM7.5 2A4.5 4.5 0 1012 6.5 4.49 4.49 0 007.5 2z"/>
                               </svg>
                        </div>
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
                        <a href="<?php echo url_for('messaging/thread/new/'); ?>" class="global-nav__primary-link ember-view">
                        <div class="global-nav__primary-link-notif">
                               <span class="nofication-badge ">
                                    <span class="notification-badge__count"></span>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                                   <path d="M16 4H8a7 7 0 000 14h4v4l8.16-5.39A6.78 6.78 0 0023 11a7 7 0 00-7-7zm-8 8.25A1.25 1.25 0 119.25 11 1.25 1.25 0 018 12.25zm4 0A1.25 1.25 0 1113.25 11 1.25 1.25 0 0112 12.25zm4 0A1.25 1.25 0 1117.25 11 1.25 1.25 0 0116 12.25z"/>
                              </svg>
                        </div>
                            <span class="global-nav__primary-link-text">Messaging</span>
                        </a>
                    </li>
                    <li class="global-nav-primary-item">
                        <a href="<?php echo url_for('notifications/'); ?>" class="global-nav__primary-link ember-view">
                            <div class="global-nav__primary-link-notif">
                               <span class="nofication-badge ">
                                    <span class="notification-badge__count"></span>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                                <path d="M22 19h-8.28a2 2 0 11-3.44 0H2v-1a4.52 4.52 0 011.17-2.83l1-1.17h15.7l1 1.17A4.42 4.42 0 0122 18zM18.21 7.44A6.27 6.27 0 0012 2a6.27 6.27 0 00-6.21 5.44L5 13h14z"/>
                                </svg>
                            </div>
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
    <section class="authentication-outlet">
        <div class="feed-container-theme feed-outlet">
                <div class="neptune-grid three-column ghost-animate-in">
                     <section class="ad-banner-container is-header-zone ember-view"></section>
                     <aside class="left-rail" role="presentation">
                         <div class="feed-identity-module profile-rail-card ember-view">
                                <div class="feed-identity-module__actor-meta profile-rail-card__actor-meta break-words">
                                    <div class=" feed-identity-module__default-bg profile-rail-card__default-bg feed-identity-module__member-bg-image profile-rail-card__member-bg-image" style="background-image:url(<?php echo url_for($profileData->profileCover); ?>)" alt="Background Image"></div>
                                    <a href="<?php echo url_for('in/'.$user->username); ?>" class="feed-link">
                                        <div class="identity_profile_photo">
                                            <img  src="<?php echo url_for($user->profilePic); ?>" alt="<?php echo $user->firstName." ".$user->lastName; ?>" class="feed-identity-module__member-photo profile-rail-card__member-photo EntityPhoto-circle-5 lazy-image ghost-person ember-view" style="background: #b3b6b9;">
                                        </div>
                                        <div class="profile-rail-card__actor-link t-16 t-black t-bold">Welcome,<?php echo $user->firstName; ?>!</div>
                                    </a>
                                </div>
                                <div class="feed-identity-module__widgets mv3">
                                            <ul class="entity-list row">
                                                <li class=" entity-list-item">
                                                    <a href="<?php echo url_for('mynetwork/'); ?>" class="ember-view full-width">
                                                        <div class="display-flex align-items-baseline">
                                                            <div class="text-align-left">
                                                                <div class="identity-widget-item__headline t-12 t-black--light t-bold attributed-text ember-view">
                                                                    <span id="ember790">Connections</span>
                                                                </div>
                                                                <div class="identity-widget-item__headline t-12 t-black--light t-bold attributed-text ember-view">
                                                                    <span id="ember794">Grow your network</span>
                                                                </div>
                                                            </div>
                                                            <div class="t-12 t-black t-bold flex-1 text-align-right">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="rgba(0,0,0,.9)" class="mercado-match" width="16" height="16" focusable="false">
                                                                <path d="M9 4a3 3 0 11-3-3 3 3 0 013 3zM6.75 8h-1.5A2.25 2.25 0 003 10.25V15h6v-4.75A2.25 2.25 0 006.75 8zM13 8V6h-1v2h-2v1h2v2h1V9h2V8z"/>
                                                            </svg>
                                                            </div>
                                                        </div>
                                                   </a>
                                                </li>
                                            </ul>
                                </div>
                                <a href="<?php echo url_for('my-items/'); ?>" class="feed-identity-module__anchored-widget link-without-hover-state p3 text-align-left ember-view">
                                    <span class="t-12 t-black t-bold v-align-middle block">
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="rgba(0,0,0,.9)" width="16" height="16" focusable="false">
                                          <path d="M12 1H4a1 1 0 00-1 1v13.64l5-3.36 5 3.36V2a1 1 0 00-1-1z"/>
                                      </svg>
                                        My items
                                    </span>
                                </a>
                         </div>
                         <div class="sticky ember-view" style="width:100%; margin-top:1.3rem;font-size:1.2rem;">
                                <div id="ember164" class="artdeco-card mb2 community-panel ember-view">
                                    <div class="community-panel-interest-package ember-view">
                                        <section class="community-panel-interest-package__section-header">
                                            <header class="text-align-left flex-1 pl3">
                                                <h2 class="community-panel-interest-package__header">
                                                    <a href="<?php echo url_for('groups/'); ?>" class="community-panel-interest-package__header-link community-panel-interest-package--hoverable t-12 t-black t-bold block pv1 app-aware-link ember-view">
                                                       <span>Groups</span> 
                                                    </a>
                                                </h2>
                                            </header>
                                        </section>
                                    </div>
                                    <div class="community-panel-interest-package ember-view">
                                        <section class="community-panel-interest-package__section-header">
                                                <header class="text-align-left flex-1 pl3">
                                                    <h2 class="community-panel-interest-package__header">
                                                        <a href="<?php echo url_for('mynetwork/network-manager/events/'); ?>" class="community-panel-interest-package__header-link community-panel-interest-package--hoverable t-12 t-black t-bold block pv1 app-aware-link ember-view">
                                                        <span>Events</span> 
                                                        </a>
                                                    </h2>
                                                </header>
                                                <div class="display-flex fr">
                                                    <button aria-label="Create an event" class="community-panel-interest-package__event-cta community-panel-interest-package--hoverable artdeco-button artdeco-button--circle artdeco-button--1 artdeco-button--tertiary ember-view">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="rgba(0,0,0,0.6)" class="mercado-match" width="16" height="16" focusable="false">
                                                    <path d="M14 9H9v5H7V9H2V7h5V2h2v5h5z"></path>
                                                    </svg>
                                                    </button>
                                                </div>
                                            </section>
                                    </div>
                                    <div class="community-panel-interest-package ember-view">
                                       <section class="community-panel-interest-package__section-header">
                                            <header class="text-align-left flex-1 pl3">
                                                <h2 class="community-panel-interest-package__header">
                                                    <a href="<?php echo url_for('feeds/following/hashtag/'); ?>" class="community-panel-interest-package__header-link community-panel-interest-package--hoverable t-12 t-black t-bold block pv1 app-aware-link ember-view">
                                                       <span>Followed Hashtag</span> 
                                                    </a>
                                                </h2>
                                            </header>
                                        </section>
                                    </div>
                                    <a href="<?php echo url_for('feed/follow/'); ?>" class="community-panel__discover-cta ember-view">
                                        Discover More
                                    </a>
                                </div>
                        </div>
                     </aside>
                     <div class="core-rail" role="main">
                            <div>
                                    <div class="share-box-feed-entry__wrapper artdeco-card">
                                            <div class="display-flex align-items-center mt2 mr4 ml4">
                                                <button type="button" class="artdeco-button artdeco-button--muted artdeco-button--4 artdeco-button--tertiary share-box-feed-entry__trigger--v2" id="postModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                                            <path d="M19 12h2v6a3 3 0 01-3 3H6a3 3 0 01-3-3V6a3 3 0 013-3h6v2H6a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1zm4-8a2.91 2.91 0 01-.87 2l-8.94 9L7 17l2-6.14 9-9A3 3 0 0123 4zm-4 2.35L17.64 5l-7.22 7.22 1.35 1.34z"/>
                                                        </svg>
                                                        Start a post
                                                </button>
                                            </div>
                                            <div class="share-box-feed-entry__bottom-bar-wrapper">
                                                <button aria-label="Upload Image" class="artdeco-button tag__btn artdeco-button--muted artdeco-button--4 artdeco-button--tertiary ember-view share-box-feed-entry__bottom-bar-item" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="#70b5f9;" class="phone__share-upload" width="24" height="24" focusable="false">
                                                        <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm1 13a1 1 0 01-.29.71L16 14l-2 2-6-6-4 4V7a1 1 0 011-1h14a1 1 0 011 1zm-2-7a2 2 0 11-2-2 2 2 0 012 2z"/>
                                                    </svg>
                                                    <span class="artdeco-button__textupload">Photo</span>
                                                </button>
                                                <button aria-label="Upload Video" class="artdeco-button tag__btn artdeco-button--muted artdeco-button--4 artdeco-button--tertiary ember-view share-box-feed-entry__bottom-bar-item" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="#e7a33e;" class="video__share-upload" width="24" height="24" focusable="false">
                                                    <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm-9 12V8l6 4z"></path>
                                                    </svg>
                                                    <span class="artdeco-button__textupload">Video</span>
                                                </button>
                                                <a href="<?php echo url_for('events'); ?>" style="color:rgb(0,0,0);" class="ember-view share-box-feed-entry__bottom-bar-item artdeco-button artdeco-button--muted artdeco-button--4 artdeco-button--tertiary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match-event" width="24" height="24" focusable="false">
                                                        <path d="M3 3v15a3 3 0 003 3h12a3 3 0 003-3V3zm13 1.75A1.25 1.25 0 1114.75 6 1.25 1.25 0 0116 4.75zm-8 0A1.25 1.25 0 116.75 6 1.25 1.25 0 018 4.75zM19 18a1 1 0 01-1 1H6a1 1 0 01-1-1V9h14zm-5.9-3a1 1 0 00-1-1H12a3.12 3.12 0 00-1 .2l-1-.2v-3h3.9v1H11v1.15a3.7 3.7 0 011.05-.15 1.89 1.89 0 012 1.78V15a1.92 1.92 0 01-1.84 2H12a1.88 1.88 0 01-2-1.75 1 1 0 010-.25h1a.89.89 0 001 1h.1a.94.94 0 001-.88z"></path>
                                                        </svg>
                                                        <span class="share-box-feed-entry__bottom-bar-item-text artdeco-button__textupload"> Event</span>
                                                </a>
                                                <a href="<?php echo url_for('post/new/'); ?>" style="color:rgb(0,0,0);" class="ember-view share-box-feed-entry__bottom-bar-item artdeco-button artdeco-button--muted artdeco-button--4 artdeco-button--tertiary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match-article" width="24" height="24" focusable="false">
                                                            <path d="M21 3v2H3V3zm-6 6h6V7h-6zm0 4h6v-2h-6zm0 4h6v-2h-6zM3 21h18v-2H3zM13 7H3v10h10z"></path>
                                                        </svg>
                                                        <span class="share-box-feed-entry__bottom-bar-item-text artdeco-button__textupload"> Write article</span>
                                                </a>
                                                
                                            </div>
                                    </div>
                            </div>
                            <div class="sort__main">
                                <button type="button" class="feed__sort-dropdown" tabindex="0">
                                    <hr class="flex-grow-1 mr2 mvA">
                                    <div class="display-flex">
                                        <span class="t-12 t-black--light t-normal">Sort by:</span>
                                        <span class="t-12 t-black t-bold mh1">Recent</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                                            <path d="M8 11L3 6h10z" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                     </div>
                     <div class="right-rail">Right</div>
                </div>
        </div>
    </section>
    <div class="artdeco-modal-outlet__post">
            <div class="artdeco-modal__postContainer">
                <div class="artdeco-modal__header">
                    <div class="artdeco-modal__header-post">
                        <h2 id="share-to-linkedin-modal__header">Create a post</h2>
                        <button aria-label="Dismiss" type="button" id="artdeco-modal__header-post-close" class="artdeco-modal__header-close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                                 <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="artdeco-modal__content-post">
                    <div class="share-post__modal">
                        <div class="share-box-v2__creation--in-modal-with-drawer">
                                <div class="share-box__content-v2--scrollable">
                                        <div id="ember1020">
                                            <div id="ember1021" class="post__modal-imgWrapper">
                                                <img src="<?php echo url_for($user->profilePic); ?>" alt="<?php echo $user->firstName." ".$user->lastName; ?>">
                                            </div>
                                            <div id="ember1022" class="display-flex ml1 artdeco-entity-lockup__content ember-view">
                                                <div class="block artdeco-entity-lockup__title ember-view"><?php echo $user->firstName." ".$user->lastName; ?></div>
                                                <button id="ember1023" class="share-state-change-button__button artdeco-button artdeco-button--muted artdeco-button--1 artdeco-button--secondary mr1">
                                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                                                     <path d="M8 1a7 7 0 107 7 7 7 0 00-7-7zM3 8a5 5 0 011-3l.55.55A1.5 1.5 0 015 6.62v1.07a.75.75 0 00.22.53l.56.56a.75.75 0 00.53.22H7v.69a.75.75 0 00.22.53l.56.56a.75.75 0 01.22.53V13a5 5 0 01-5-5zm6.24 4.83l2-2.46a.75.75 0 00.09-.8l-.58-1.16A.76.76 0 0010 8H7v-.19a.51.51 0 01.28-.45l.38-.19a.74.74 0 01.68 0L9 7.5l.38-.7a1 1 0 00.12-.48v-.85a.78.78 0 01.21-.53l1.07-1.09a5 5 0 01-1.54 9z"></path>
                                                   </svg>
                                                   <span class="ph1">Anyone</span>
                                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                                                       <path d="M8 11L3 6h10z" fill-rule="evenodd"></path>
                                                   </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="editor-container">
                                            <textarea placeholder="What do you want to talk about?" aria-label="What do you want to talk about?" id="editorInput" class="ql-editor" role="textbox" autofocus="true"></textarea>
                                        </div>
                                </div>
                               
                        </div>
                        <div class="share-box__footer">
                             <div class="share-box__detour-btn-container">
                                 <button type="button" id="ember1100" class="artdeco-button artdeco-button--circle artdeco-button--muted artdeco-button--2 artdeco-button--tertiary ember-view">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                       <path d="M21 13h-8v8h-2v-8H3v-2h8V3h2v8h8z"></path>
                                    </svg>
                                 </button>
                                 <button type="button" id="ember1101" class="artdeco-button artdeco-button--circle artdeco-button--muted artdeco-button--2 artdeco-button--tertiary ember-view">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                       <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm1 13a1 1 0 01-.29.71L16 14l-2 2-6-6-4 4V7a1 1 0 011-1h14a1 1 0 011 1zm-2-7a2 2 0 11-2-2 2 2 0 012 2z"></path>
                                    </svg>
                                 </button>
                                 <button type="button" id="ember1102" class="artdeco-button artdeco-button--circle artdeco-button--muted artdeco-button--2 artdeco-button--tertiary ember-view">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                       <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm-9 12V8l6 4z"></path>
                                    </svg>
                                 </button>
                                 <button type="button" id="ember1103" class="artdeco-button artdeco-button--circle artdeco-button--muted artdeco-button--2 artdeco-button--tertiary ember-view">
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                      <path d="M3 3v15a3 3 0 003 3h9v-6h6V3zm9 8H6v-1h6zm6-3H6V7h12zm-2 8h5l-5 5z"></path>
                                    </svg>
                                 </button>
                             </div>
                             <div class="share-box__actions mlA">
                                 <button id="ember1104" type="button" class="share-actions__primary-action artdeco-button artdeco-button--2 artdeco-button--primary artdeco-button--disabled ember-view" disabled>
                                     <span class="artdeco-button__text-disabled">Post</span>
                                 </button>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <section id="artdeco-toasts-succ" class="artdeco-toast-succ">
        <ul class="artedeco-toast-item_toasts__post">
           
        </ul>
    </section>
    <script src="<?php echo url_for('frontend/assets/js/common.js'); ?>"></script>
    <script src="<?php echo url_for('frontend/assets/js/post.js'); ?>"></script>
</body>