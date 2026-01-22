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
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0 auth-page">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-6 auth-left">
              <div class="auth-left-inner">
                <a href="<?=cn();?>" class="auth-logo">
                  <img src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" alt="logo" class="logo-lg">
                </a>
                <h2 class="auth-headline">Grow your social media with BoostySMM</h2>
                <p class="auth-subtext">Fast, affordable & trusted SMM services</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <p class="login-card-description">Create Your Account</p>
                <p class="login-card-subtext">Start boosting your social presence today</p>
                <?php echo form_open($form_url, $form_attributes); ?>
                  <div class="form-group">
                    <div class="input-icon-group">
                      <span class="input-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.6"/>
                          <path d="m3 8 9 6 9-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </span>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>
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

                  <div class="form-group">
                    <div class="input-icon-group">
                      <span class="input-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <rect x="4" y="10" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.6"/>
                          <path d="M8 10V7a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                      </span>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Create password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-icon-group">
                      <span class="input-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <rect x="4" y="10" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.6"/>
                          <path d="M8 10V7a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                      </span>
                      <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Confirm password">
                    </div>
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
                  <div class="form-prompt-wrapper mb-4">
                    <div class="custom-control custom-checkbox login-card-check-box">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" name="terms">
                      <label class="custom-control-label" for="customCheck1">I agree to <a class="auth-link" href="<?=cn('terms')?>">Terms &amp; Conditions</a> &amp; <a class="auth-link" href="<?=cn('terms')?>">Privacy Policy</a></label>
                    </div>              
                  </div>
                  <button class="btn btn-block login-btn btn-submit mb-4" type="submit">Create Account</button>
                  
                  <?php echo $social_login_html?>

                <?php echo form_close(); ?>
                <div class="trust-badges">
                  <span>✔ Secure login</span>
                  <span>✔ No spam</span>
                  <span>✔ 24/7 support</span>
                </div>
                <p class="login-card-footer-text">Already have an account? <a href="<?=cn('auth/login')?>" class="auth-cta-link">Login here</a></p>
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
