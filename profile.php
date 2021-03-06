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
$page_title=$profileData->firstName." ".$profileData->lastName ." | LinkedIn";
$userProfileData=$loadFromUser->userProfileData($profileId);
?>
<?php require_once "backend/shared/mainHeader.php"; ?>
<body>
    <div class="u_p_id" data-uid="<?php echo $user_id; ?>"  data-pid="<?php echo $profileId ?>"></div>
    <?php require_once "backend/shared/mainNav.php"; ?>
    <main class="core-rail core-profile">
        <div class="main-area">
                <div class="profile-left-wrap">
                    <div class="profile-cover-wrap" style="background-image:url(<?php echo url_for($profileData->profileCover); ?>)" alt="Background Image">
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
                        <div class="cover-photo-rest-wrap">
                               <?php if($profileId ==$user_id){ ?>
                                <?php if($user->profileEdited=='0'){ ?>
                                <div class="pv-top-card--photo text-align-left">
                                    <div class="pv-top-card__photo-wrapper ml0">
                                      <div class="profile-pic">
                                        <button aria-label="Profile photo Btn" class="pv-top-card__edit-photo-button" type="button">
                                            <img src="<?php echo url_for('frontend/assets/images/profileCamera.svg') ?>" alt="">
                                        </button>
                                      </div>
                                    </div>
                                </div>
                                <?php }else if($user->profileEdited=='1'){ ?>
                                    <div class="dont-add-profile-photo">
                                        <div class="pv-top-card--profile-photo">
                                            <div class="pv-top-card__profile-photo-wrapper ml0">
                                            <div class="profile-pic-user">
                                                <img src="<?php echo url_for($user->profilePic); ?>" alt="<?php echo $profileData->firstName." ".$profileData->lastName; ?>" title="<?php echo $profileData->firstName." ".$profileData->lastName; ?>">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                <?php }else{ ?>
                                <div class="dont-add-profile-photo">
                                    <div class="pv-top-card--profile-photo">
                                        <div class="pv-top-card__profile-photo-wrapper ml0">
                                        <div class="profile-pic-user">
                                            <img src="<?php echo url_for($profileData->profilePic); ?>" alt="<?php echo $profileData->firstName." ".$profileData->lastName; ?>" title="<?php echo $profileData->firstName." ".$profileData->lastName; ?>">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                        </div>
                        <?php if($profileId ==$user_id){ ?>
                            <div class="right-icon">
                                  <a href="<?php echo url_for("in/".$user->username."/edit/intro"); ?>">
                                        <button class="edit-profile-icon" type="button">
                                            <img src="<?php echo url_for('frontend/assets/images/penIcon.svg') ?>" alt="">
                                        </button>
                                 </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="ph5 pb5">
                            <div class="display-flex mt2 p-10">
                               <div class="flex-1 mr5">
                                        <ul class="pv-top-card--list inline-flex align-items-center">
                                            <li class="inline t-24 t-black t-normal break-words"><?php echo $profileData->firstName." ".$profileData->lastName; ?></li>
                                        </ul>
                                        <h2 class="mt1 t-18 t-black t-normal break-words">
                                          <?php  if(!empty($userProfileData->shortBio)): ?>
                                             <?php echo $userProfileData->shortBio; ?>
                                          <?php endif; ?>
                                        </h2>
                                        <ul class="pv-top-card--list inline-flex pv-top-card--list-bullet">
                                            <li class="inline">
                                            <?php  if(!empty($userProfileData->country)): ?>
                                             <!-- Greater Accra, Ghana --><?php echo $userProfileData->country; ?>
                                             <?php endif; ?>
                                            </li>
                                            <?php  if(!empty($userProfileData->country)): ?>
                                            <li class="line-block">
                                                <a href="#" class="contact-link">
                                                    <span class="t-16 link-without-visited-state">Contact info</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>

                                      </div>
                               <div class="p-header-sch">
                                   <h2><a href="#">
                                    <?php  if(!empty($userProfileData->college)): ?>
                                       <?php echo $userProfileData->college; ?>
                                       <?php endif; ?>
                                    </a>
                                </h2>
                               </div>
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
                                <img src="" alt="" id="imagePreview" class="imagePreview" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                    </button>
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
    <div class="modal-pic" id="modal-pic">
        <div class="artdeco-modal-pic" role="dialog" aria-labelledby="profile-topcard-background-image-education-header">
                <div class="header__topcard">
                    <h2 id="profile-topcard-background-image-education-header">
                        Add photo
                    </h2>
                    <button aria-label="Dismiss" class="artdeco-modal__dismiss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                           <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                        </svg>
                    </button>
                </div>
                <div class="modal-body__topcard">
                        <p class="t-24 t-black t-normal">No professional headshot needed!</p>
                        <p class="t-24 t-black t-normal">Just something that represents you.</p>
                        <div class="a-modal-pic-wrapper">
                                <img src="<?php echo url_for('frontend/assets/images/groupImage.png'); ?>" alt="Example Profile Photo" class="mb5">
                        </div>
                        <p class="education-paragraph t-14 t-black--light t-normal mb3"> Take or upload a photo. Then crop, filter and adjust it to perfection.</p>
                </div>
                <div class="modal__footer-topcard">
                    <button data-control-name="background_image_education_upload" id="ember760" class="relative artdeco-button artdeco-button--2 artdeco-button--primary ember-view"><!---->
                        <span class="artdeco-button__text">
                             <label for="uploadCoverPhoto"> Upload photo</label>
                            <input aria-label="Upload photo" id="photoUpload" class="profile-topcard-background-image-edit__input" accept="image/*" type="file">
                        </span>
                    </button>
                </div>
        </div>
        <div class="artdeco-modal-step art-pic-step" role="dialog" aria-labelledby="profile-topcard-background-image-education-header">
                <div class="header__topcard">
                    <h2 id="profile-topcard-background-image-education-header">
                        Edit Photo
                    </h2>
                    <button aria-label="Dismiss" class="artdeco-modal__dismiss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                           <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                        </svg>
                    </button>
                </div>
                <div class="modal-body__topcard">
                        <div class="imagePreviewContainer" id="imagePreviewContainer" style="height: 297px; width: 716px;">
                                <img src="" alt="" id="profileImagePreview" class="imagePreview" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                </div>
                <div class="modal__footer-topcard">
                    <button data-control-name="background_image_education_upload" id="ember760" class="relative artdeco-button artdeco-button--2 artdeco-button--primary ember-view profileUploadButton"><!---->
                        <span class="artdeco-button__text">
                             Save Photo
                           
                        </span>
                    </button>
                </div>
        </div>
    </div>
   
    <?php if(strpos($_SERVER['REQUEST_URI'], '/edit/intro')) :?>
        <div class="modal-pic-edit" id="modal-pic" style="display:block">
        <div class="artdeco-modal-pic-edit" style="" role="dialog" aria-labelledby="profile-topcard-background-image-education-header">
                <div class="header__topcard">
                    <h2 id="profile-topcard-background-image-education-header">
                        Edit intro
                    </h2>
                    <button aria-label="Dismiss" class="artdeco-modal__dismiss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                           <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                        </svg>
                    </button>
                </div>
                <div class="p__edit-modal-body__topcard">
                        <div class="profile-cover-wrap" style="background-image:url(<?php echo url_for($profileData->profileCover); ?>)" alt="Background Image">
                                        <div class="edit-cover-photo" id="edit-cover-photo">
                                           <label for="p__edit-profileCover">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="#0a66c2;" width="16" height="16" focusable="false">
                                                        <path d="M14 4h-1.75l-1-2h-6.5l-1 2H2a1 1 0 00-1 1v7a1 1 0 001 1h12a1 1 0 001-1V5a1 1 0 00-1-1zm-1 7H3V8h2a3 3 0 006 0h2v3zm-2.87-3A2.13 2.13 0 118 5.88 2.13 2.13 0 0110.13 8zM13 7h-2.18a3 3 0 00-5.64 0H3V6h2l1-2h4l1 2h2v1z" fill="#0a66c2;"></path>
                                                </svg>
                                           </label> 
                                           <input type="file" id="p__edit-profileCover" class="p__edit-profileCover">
                                        </div>
                                        <div class="pr__edit-camera">
                                                <div class="pr__edit-wrapper">
                                                   <div class="pr__ed-wrapper">
                                                        <label for="profile__edit-modal" class="pr__edit-wrapper-label">
                                                            <img src="<?php echo url_for('frontend/assets/images/profileCamera.svg') ?>" alt="">
                                                        </label>
                                                        <input type="file" class="profile__edit-modal" id="profile__edit-modal">
                                                   </div>
                                                </div>
                                        </div>
                        </div> 
                        <div class="pe-form-body__content">
                            <form action="" class="pe-form__container">
                                <div class="pe__wrapper">
                                    <div class="pe-s-multi-field">
                                        <div class="pe-top-card-form__name-field">
                                          <label for="topcard-firstname" class="pe-form-field__label label-text required">First Name</label>
                                          <input aria-required="true" name="firstName" maxlength="50" id="topcard-firstname" class="ember-text-field pe-form-field__text-input ember-view" type="text" value="<?php echo $user->firstName; ?>" autofocus>
                                        </div>
                                        <div class="pe-top-card-form__name-field">
                                          <label for="topcard-lastname" class="pe-form-field__label label-text required">Last Name</label>
                                          <input aria-required="true" name="lastName" maxlength="50" id="topcard-lastname" class="ember-text-field pe-form-field__text-input ember-view" type="text" value="<?php echo $user->lastName; ?>">
                                        </div>
                                    </div>
                                    <div class="pe-form-field pe-top-card-form__headline-field floating-label  pe-form-field--has-error">
                                        <label for="topcard-headline" class="pe-form-field__label label-text required">Headline</label>
                                        <textarea  id="topcard-headline"  class="pe-top-card-form__headline-text ember-text-area pe-form-field__textarea ember-view" style="margin: 0px; height: 70px; width: 622px;"><?php if(!empty($userProfileData->college)): ?>Student at <?php echo $userProfileData->college; ?>
                                            <?php endif; ?>
                                        </textarea>
                                    </div>
                                    <div class="pe-form-field pe-form-field__country-region-picker relative ember-view">
                                       <label for="location-country-region" class="pe-form-field__label required">Country/Region</label>
                                       <input type="text" value="<?php (!empty($userProfileData->country) ?  $userProfileData->country : "" ) ; ?>"  id="location-country-region">
                                    </div>
                                    <div class="pe-form-field pe-top-card-form__education-field floating-label">
                                       <label for="topcard-education" class="pe-form-field__label  label-text pe-form-field__label required">Education</label>
                                       <input type="text" id="topcard-education" value="<?php (!empty($userProfileData->college) ? $userProfileData->college : "") ; ?>" name="topcard-education">
                                    </div>
                                    <div class="pe-form-field industry-field">
                                       <label for="topcard-industry" class="pe-form-field__label required">Industry</label>
                                       <select  id="topcard-industry" name="industry" class="ember-view">
                                           <option value="">Choose an industry...</option>
                                            <?php echo $account->getCareers(); ?> 
                                       </select>
                                    </div>
                                    <div class="pe-form-field pe-top-card-form__contact-info-field">
                                        <label for="topcard-contact-info" class="pe-form-field__label">Contact info</label>
                                        <div class="pe-top-card-form__contact-info display-flex align-items-center">
                                            <p class="pe-top-card-form__contact-info-details t-14 t-black t-normal">Profile URL ,Email , WeChat ID</p>
                                            <button type="button" class="pe-top-card-form__contact-info-edit-button artdeco-button artdeco-button--circle artdeco-button--2 artdeco-button--tertiary ember-view" id="pencilBtn-edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="#0a66c2" class="mercado-match" width="24" height="24" focusable="false">
                                                    <path d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z" fill="rgba(0, 0, 0, 0.35);" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>   
                </div>
                <div class="modal__footer-topcard">
                    <button data-control-name="background_image_education_upload" id="eprofile" class="relative artdeco-button artdeco-button--2 artdeco-button--primary ember-view"><!---->
                        <span class="artdeco-button__text">
                             Save
                        </span>
                    </button>
                </div>
        </div>
        <div class="artdeco-modal-pic-cover-edit" role="dialog" aria-labelledby="profile-topcard-background-image-education-header">
                <div class="header__topcard">
                   <div class="ed_p__head">
                        <button class="back__edit" type="button">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                <path d="M9 4l-4.87 7H22v2H4.13L9 20H6.56L1 12l5.56-8z"/>
                            </svg>
                        </button>
                        <h2 id="profile-topcard-background-image-education-header" class="p_h3">
                            Background photo
                        </h2>
                   </div>
                    <button aria-label="Dismiss" class="artdeco-modal__dismiss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                           <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                        </svg>
                    </button>
                </div>
                <div class="p__edit-modal-body__topcard-bg">
                        <div class="imagePreviewContainer" id="imagePreviewContainer" style="height: 297px; width: 716px;">
                                <img src="" alt="" id="profileEditImagePreview" class="imagePreview" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                </div>
                <div class="modal__footer-topcard">
                    <button data-control-name="background_image_education_upload" id="editPhoto" class="relative artdeco-button artdeco-button--2 artdeco-button--primary ember-view"><!---->
                        <span class="artdeco-button__text">
                             Apply
                        </span>
                    </button>
                </div>
        </div>
        <div class="artdeco-modal-pic-contact-info" style="overflow-y:auto;"role="dialog" aria-labelledby="profile-topcard-background-image-education-header">
                <div class="header__topcard">
                    <div class="ed_p__head">
                         <button class="back___home-edit" type="button">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                  <path d="M9 4l-4.87 7H22v2H4.13L9 20H6.56L1 12l5.56-8z"/>
                             </svg>
                        </button>
                        <h2 id="profile-topcard-background-image-education-header">
                             Edit contact info
                        </h2>
                    </div>
                    <button aria-label="Dismiss" class="artdeco-modal__dismiss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="currentColor" class="mercado-match" width="16" height="16" focusable="false">
                           <path d="M14 3.41L9.41 8 14 12.59 12.59 14 8 9.41 3.41 14 2 12.59 6.59 8 2 3.41 3.41 2 8 6.59 12.59 2z"/>
                        </svg>
                    </button>
                </div>
                <div class="p__edit-modal-body__topcard">
                        <div class="pe-form-body__content">
                            <form action="" class="pe-s-form__container">
                                <div class="pe-s-form__body pe-form-body">
                                     <div class="pe-form-field pe-contact-info-form__profile-url-field">
                                       <label for="pe-form-field__label" class="pe-form-field__label">Profile URL</label>
                                         <a href="#" target="_blank" class="link-redirect pe-contact-info-form__external-link link-without-visited-state t-14 ember-view">
                                          linkedin.com/in/<?php echo $user->username; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="#0073b1" class="mercado-match" width="16" height="16" focusable="false">
                                                 <path d="M15 1v6h-2V4.41L7.41 10 6 8.59 11.59 3H9V1zm-4 10a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1h2V3H5a3 3 0 00-3 3v5a3 3 0 003 3h5a3 3 0 003-3V9h-2z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="pe-form-field floating-label  pe-contact-info-form__hidden-new-item">
                                            <label for="contact-website-ember2005" class="pe-form-field__label label-text">Website URL</label>
                                            <div class="pe-contact-info-form__types-field">
                                                <div class="pe-contact-info-form__types-input">
                                                    <input type="text" maxlength="249" id="contact-website-ember2005" class="ember-text-field pe-form-field__text-input ember-view">
                                                </div>
                                                <select id="contact-website-type-ember2005" class="pe-contact-info-form__types-select ember-view" name="contact-website">
                                                    <option value="PERSONAL">Personal</option>
                                                    <option value="COMPANY">Company</option>
                                                    <option value="BLOG">Blog</option>
                                                    <option value="RSS">RSS Feed</option>
                                                    <option value="PORTFOLIO">Portfolio</option>
                                                    <option value="OTHER">Other</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="pe-form-field floating-label  pe-contact-info-form__hidden-new-item">
                                            <label for="contact-phone-ember1838" class="pe-form-field__label label-text">Phone</label>
                                            <div class="pe-contact-info-form__types-field">
                                                <div class="pe-contact-info-form__types-input">
                                                    <input type="text" aria-required="true" name="contact-phone" maxlength="50"  id="contact-phone-ember1838" class="ember-text-field pe-form-field__text-input ember-view">
                                                </div>
                                                <select id="contact-phone-type-ember1838" name="phone" class="pe-contact-info-form__types-select ember-view" name="contact-website">
                                                    <option value="HOME">Home</option>
                                                    <option value="WORK">Work</option>
                                                    <option value="MOBILE">Mobile</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="pe-form-field pe-top-card-form__headline-field floating-label  pe-form-field--has-error">
                                        <label for="contact-address" class="pe-form-field__label label-text required">Address</label>
                                        <textarea  id="contact-address" rows="2" maxlength="1000" class="pe-top-card-form__headline-text ember-text-area pe-form-field__textarea ember-view" style="margin: 0px; height: 70px; width: 622px;"></textarea>
                                    </div>
                                    <div class="pe-form-field pe-form-field__country-region-picker relative ember-view mb-2">
                                       <label for="pe-form-field__label" class="pe-form-field__label">Email address</label>
                                       <a href="#" target="_blank" class="link-redirect pe-contact-info-form__external-link t-14 t-black--light t-normal ember-view">
                                           <?php echo $user->email; ?>
                                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="#0073b1" class="mercado-match" width="16" height="16" focusable="false">
                                                 <path d="M15 1v6h-2V4.41L7.41 10 6 8.59 11.59 3H9V1zm-4 10a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1h2V3H5a3 3 0 00-3 3v5a3 3 0 003 3h5a3 3 0 003-3V9h-2z"/>
                                            </svg>
                                       </a>
                                    </div>
                                    <div class="pe-form-field birthday-field">
                                        <label class="pe-form-field__label" aria-hidden="true">Birthday</label>
                                        <div class="pe-form-time-period__single-date-container">
                                                <div id="ember" class="pe-form-field__month-year-date ember-view">
                                                    <label class="visually-hidden" for="birthday-day">Birthday day</label>
                                                    <span class="ember-view">
                                                        <select name="birth-day" id="birthday-day" class="ember-view">
                                                            <option value="">Day</option>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div id="ember" class="pe-form-field__month-year-date ember-view">
                                                    <label class="visually-hidden" for="birthday-month">Birthday month</label>
                                                    <span class="ember-view">
                                                        <select name="birth-month" id="birthday-month" class="ember-view">
                                                            <option value="">Month</option>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div id="ember" class="pe-form-field__month-year-date ember-view">
                                                    <label class="visually-hidden" for="birthday-year">Birthday year</label>
                                                    <span class="ember-view">
                                                        <select name="birth-year" id="birthday-year" class="ember-view">
                                                            <option value="">Year</option>
                                                        </select>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="mt1 visibility-setting visibility-setting--trailing ember-view">
                                        <button type="button" class="visibility-setting__trigger t-14 t-black--light t-bold artdeco-dropdown__trigger artdeco-dropdown__trigger--placement-top ember-view">
                                           <span class="visibility-setting__trigger-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-supported-dps="16x16" fill="#0073b1" class="mercado-match" width="16" height="16" focusable="false">
                                                        <path d="M8 3a8.59 8.59 0 00-8 5 8.54 8.54 0 008 5 8.55 8.55 0 008-5 8.55 8.55 0 00-8-5zm0 8a3 3 0 113-3 3 3 0 01-3 3zm2-3a2 2 0 11-2-2 2 2 0 012 2z"/>
                                                </svg>
                                                <span class="mh1">Birthday visible to:</span>Only You
                                           </span>   
                                           
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>   
                </div>
                <div class="modal__footer-topcard">
                    <button data-control-name="background_image_education_upload" id="contantprofile-info" class="relative artdeco-button artdeco-button--2 artdeco-button--primary ember-view"><!---->
                        <span class="artdeco-button__text">
                             Apply
                        </span>
                    </button>
                </div>
        </div>
     </div>
    <?php endif; ?>
    
    <script src="<?php echo url_for('frontend/assets/js/profile.js');?>"></script>
    <script src="<?php echo url_for('frontend/assets/js/birthday.js');?>"></script>
</body>