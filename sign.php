<?php
 include_once 'backend/init.php';

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
                  <form action="" class="login-page-form" method="POST">
                      <!-- <input type="text" class="form-login-input" placeholder="Email or mobile number">
                      <input type="password" class="form-login-input"> -->
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="firstname" aria-hidden="true">First name</label>
                          <input id="firstname" name="firstname" type="text" aria-describedby="error-for-firstname" required autofocus="" aria-label="Email or Phone">
                          <div error-for="firstname" id="error-for-firstname" class="form__label--error" role="alert" aria-live="assertive"></div>
                      </div>
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="lastname" aria-hidden="true">Last name</label>
                          <input id="lastname" name="lastname" type="text" aria-describedby="error-for-lastname" required autofocus="" aria-label="Email or Phone">
                          <div error-for="lastname" id="error-for-lastname" class="form__label--error" role="alert" aria-live="assertive"></div>
                      </div>
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="username" aria-hidden="true">Email</label>
                          <input id="username" name="username" type="text" aria-describedby="error-for-username" required autofocus="" aria-label="Email or Phone">
                          <div error-for="username" id="error-for-username" class="form__label--error" role="alert" aria-live="assertive"></div>
                      </div>
                      <div class="form__input--floating mt-24">
                          <label class="form__label--floating" for="password" aria-hidden="true">Password(6 or more characters)</label>
                          <div class="check_pass">
                              <input id="password" name="password" type="password"  required>
                              <!-- An element to toggle between password visibility -->
                              <input type="checkbox" onclick="myFunction()" class="checkbox">
                          </div>
                          <div error-for="password" id="error-for-password" class="form__label--error" role="alert" aria-live="assertive"></div>
                      </div>
                      <div class="terms">
                          <p>By clicking Agree & Join, you agree to the LinkedIn User Agreement, Privacy Policy, and Cookie Policy.</p>
                      </div>
                      <input type="submit" class="form-login-btn" value="Agree & Join">
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