<!DOCTYPE html>
<html lang="en">
  <?php 
    include_once 'blocks/head.blade.php';
    $form_url        = cn("auth/ajax_sign_up");
    $form_attributes = [
      'id'            => 'signUpForm', 
      'data-focus'    => 'false', 
      'class'         => 'actionFormWithoutToast', 
      'data-redirect' => cn('new_order'), 
      'method'        => "POST"  
    ];
  ?>
  <body>
    <main class="auth-page">
      <div class="container">
        <div class="auth-split">
          <div class="auth-brand">
            <a class="auth-logo" href="<?=cn();?>">
              <img src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" alt="BoostySMM logo" class="logo">
            </a>
            <h2>Grow your social media with BoostySMM</h2>
            <p>Fast, affordable & trusted SMM services</p>
          </div>
          <div class="auth-card">
            <div class="card-body">
              <p class="login-card-description">Create Your Account</p>
              <p class="auth-subtitle">Start boosting your social presence today</p>
              <?php echo form_open($form_url, $form_attributes); ?>
                <div class="form-group input-with-icon">
                  <span class="input-icon"><i class="fas fa-envelope"></i></span>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                </div>

                  <?php if (get_option('enable_signup_skype_field')) : ?>
                    <div class="form-group">
                      <input type="text" name="skype_id" id="skype_id" class="form-control" placeholder="<?php echo lang("Skype_id"); ?>">
                    </div>
                  <?php endif; ?>

                  <?php if (get_option('enable_signup_whatsapp_field')) : ?>
                    <div class="form-group">
                      <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="<?php echo lang("Whatsapp"); ?>" required>
                    </div>
                  <?php endif; ?>

                  <div class="form-group input-with-icon">
                    <span class="input-icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Create password">
                  </div>
                  <div class="form-group input-with-icon">
                    <span class="input-icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Confirm password">
                  </div>
                  <!-- reCAPCHA -->
                  <?php if (get_option('enable_goolge_recapcha') &&  get_option('google_capcha_site_key') != "" && get_option('google_capcha_secret_key') != "") : ?>
                    <div class="form-group">
                      <div class="g-recaptcha" data-sitekey="<?=get_option('google_capcha_site_key')?>"></div>
                    </div>
                  <?php endif; ?>
                  <!-- alert Message -->
                  <div class="form-group mt-20">
                    <div id="alert-message" class="alert-message-reponse"></div>
                  </div>
                  <div class="form-prompt-wrapper mb-4 auth-terms">
                    <div class="custom-control custom-checkbox login-card-check-box">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="terms">
                      <label class="custom-control-label" for="customCheck1">I agree to <a href="<?=cn('terms')?>">Terms & Conditions</a> &amp; <a href="<?=cn('terms')?>">Privacy Policy</a></label>
                    </div>              
                  </div>
                  <button class="btn btn-block login-btn btn-submit mb-4 auth-submit" type="submit">Create Account</button>
                  
                  <?php echo $social_login_html?>

                <?php echo form_close(); ?>
                <p class="login-card-footer-text auth-redirect">
                  <span>Already have an account?</span> <a href="<?=cn('auth/login')?>">Login here</a>
                </p>
                <div class="auth-trust">
                  <span>✔ Secure login</span>
                  <span>✔ No spam</span>
                  <span>✔ 24/7 support</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
  <?php 
    include_once 'blocks/script.blade.php';
  ?>
</html>
