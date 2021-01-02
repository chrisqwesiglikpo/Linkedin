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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="nav-icon" width="24" height="24" focusable="false">
                                    <path d="M23 9v2h-2v7a3 3 0 01-3 3h-4v-6h-4v6H6a3 3 0 01-3-3v-7H1V9l11-7z"/>
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