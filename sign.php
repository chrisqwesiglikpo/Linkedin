<?php
 include_once 'backend/init.php';
 if(Login::isLoggedIn()){
  redirect_to(url_for("profile"));
}else if(isset($_SESSION['userLoggedIn'])){
  redirect_to(url_for("profile"));
}
 if(is_post_request()){
  if(isset($_POST['submitButton'])){
    $firstName=FormSanitizer::sanitizeFormString($_POST['firstname']);
    $lastName=FormSanitizer::sanitizeFormString($_POST['lastname']);

    $email=FormSanitizer::sanitizeFormEmail($_POST['email']);

    $password=FormSanitizer::sanitizeFormPassword($_POST['password']);
    $password2=FormSanitizer::sanitizeFormPassword($_POST['cpassword']);

    $username=$account->generateUsername($firstName,$lastName);
    
    $wasSuccessful=$account->register($firstName,$lastName,$username,$email,$password,$password2);
    if($wasSuccessful){
      session_regenerate_id();
      $user_id=$account->getUserId($email);
      $tstrong = true;
      $loadFromUser->create('profile',['userId'=>$user_id]);
      $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
      $loadFromUser->create('token', array('token'=>sha1($token), 'user_id'=>$user_id));
      setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
      $_SESSION["userLoggedIn"]=$user_id;
      $username=$loadFromUser->getUsernameById($user_id);
      redirect_to(url_for("in/".$username));
    }

  }

 }
?>
<?php require_once "backend/shared/loginHeader.php"; ?>
<body style="background: linear-gradient(45deg, #0073b1, #0c8996);
    background-attachment: fixed;
    background-color: #0073b1;">
  <div id="app__container">
    <main class="app__content">
       <div class="login-page">
         <div class="login-page-content">
              <div class="login-page-logo logo">
                 <span class="site-logo">Linked</span><img src="frontend/assets/images/siteLogo.svg" alt="">
              </div>
              <div class="card-layout">
                  <div class="header__content ">
                     <h1 class="header__content__heading ">SignUp</h1>
                     <p class="header__content__subheading ">Make the most of your professional life</p>
                  </div>
                  <form  action="<?php echo h($_SERVER["PHP_SELF"]);?>" class="login-page-form" method="POST">
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="firstname" aria-hidden="true">First name</label>
                          <input id="firstname" name="firstname" type="text" aria-describedby="error-for-firstname"  value="<?php getInputValue('firstname'); ?>" autocomplete="off" autofocus required>
                          <div error-for="firstname" id="error-for-firstname" class="form__label--error" role="alert" aria-live="assertive"><?php echo $account->getError(Constants::$firstNameCharacters); ?></div>
                      </div>
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="lastname" aria-hidden="true">Last name</label>
                          <input id="lastname" name="lastname" type="text" aria-describedby="error-for-lastname" value="<?php getInputValue('lastname'); ?>" autocomplete="off" required autofocus>
                          <div error-for="lastname" id="error-for-lastname" class="form__label--error" role="alert" aria-live="assertive"><?php echo $account->getError(Constants::$lastNameCharacters); ?></div>
                      </div>
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="username" aria-hidden="true">Email</label>
                          <input id="username" name="email" type="email" aria-describedby="error-for-username" value="<?php getInputValue('email'); ?>" autocomplete="off"  required autofocus>
                          <div error-for="username" id="error-for-username" class="form__label--error" role="alert" aria-live="assertive">
                               <?php echo $account->getError(Constants::$emailTaken); ?>   
                               <?php echo $account->getError(Constants::$emailInvalid); ?>  
                          </div>
                      </div>
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="password" aria-hidden="true">Password(6 or more characters)</label>
                          <div class="check_pass">
                              <input id="password" name="password" type="password"  required>
                              <!-- An element to toggle between password visibility -->
                              <input type="checkbox" onclick="myFunction()" class="checkbox">
                          </div>
                          <div error-for="password" id="error-for-password" class="form__label--error" role="alert" aria-live="assertive">
                          <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>  
                          <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>  
                          <?php echo $account->getError(Constants::$passwordLength); ?>  
                          </div>
                      </div>
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="cpassword" aria-hidden="true">Confirm Password</label>
                          <div class="check_pass">
                              <input id="cpassword" name="cpassword" type="password"  required>
                          </div>
                          <div error-for="password" id="error-for-password" class="form__label--error" role="alert" aria-live="assertive"></div>
                      </div>
                      <div class="terms">
                          <p>By clicking Agree & Join, you agree to the LinkedIn User Agreement, Privacy Policy, and Cookie Policy.</p>
                      </div>
                      <input type="submit" class="form-login-btn" value="Agree & Join" name="submitButton">
                  </form>
              </div>
              <div class="login-page__footer">
                <div class="sign-join-now">
                  <span class="sign__join" style="color:#fff">Already on LinkedIn?</span><a href="login.php" style="color:#fff;padding-left:1rem;" class="s_in">Sign in</a>
                </div>
              </div>
         </div>
       </div>
    </main>
  </div>
  <script src="frontend/assets/js/common.js"></script>
</body>
</html>