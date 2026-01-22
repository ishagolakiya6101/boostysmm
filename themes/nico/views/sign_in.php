<!DOCTYPE html>
<html lang="en">
  <?php 
    include_once 'blocks/head.blade.php';
    $cookie_email = '';
    $cookie_pass = '';
    if (isset($_COOKIE["cookie_email"])) {
      $cookie_email = encrypt_decode($_COOKIE["cookie_email"]);
    }
    if (isset($_COOKIE["cookie_pass"])) {
      $cookie_pass = encrypt_decode($_COOKIE["cookie_pass"]);
    }
    $form_url        = cn("auth/ajax_sign_in");
    $form_attributes = [
      'id'            => 'signUpForm', 
      'data-focus'    => 'false', 
      'class'         => 'actionFormWithoutToast', 
      'data-redirect' => cn('home'), 
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
                <p class="login-card-description"><?=lang("login_to_your_account")?></p>
                <?php echo form_open($form_url, $form_attributes); ?>
                  <div class="form-group">
                    <label for="email" class="sr-only"><?php echo lang("Email"); ?></label>
                    <div class="input-icon-group">
                      <span class="input-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.6"/>
                          <path d="m3 8 9 6 9-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </span>
                      <input type="email" name="email" id="email" class="form-control" value="<?=(isset($cookie_email) && $cookie_email != "") ? $cookie_email : '' ?>" placeholder="Enter your email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="sr-only"><?php echo lang("Password"); ?></label>
                    <div class="input-icon-group">
                      <span class="input-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                          <rect x="4" y="10" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.6"/>
                          <path d="M8 10V7a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                      </span>
                      <input type="password" name="password" id="password" class="form-control" value="<?=(isset($cookie_pass) && $cookie_pass != "") ? $cookie_pass : ""?>" placeholder="Enter your password">
                    </div>
                  </div>

                  <div class="form-group mt-20">
                    <div id="alert-message" class="alert-message-reponse"></div>
                  </div>

                  <?php if (!session('uid')) : ?>
                    <div class="form-prompt-wrapper mb-4">
                      <div class="custom-control custom-checkbox login-card-check-box">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" <?=(isset($cookie_email) && $cookie_email != "") ? "checked" : ""?>>
                        <label class="custom-control-label" for="customCheck1"><?=lang("remember_me")?></label>
                      </div>              
                    </div>
                  <?php endif; ?> 

                  <?php
                    if (get_option('enable_goolge_recapcha') &&  get_option('google_capcha_site_key') != "" && get_option('google_capcha_secret_key') != "") {
                  ?>
                  <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="<?=get_option('google_capcha_site_key')?>"></div>
                  </div>
                  <?php } ?> 

                  <button class="btn btn-block login-btn btn-submit mb-4" type="submit"><?=lang("Login")?></button>
                  <?php echo $social_login_html?>

                <?php echo form_close(); ?>
                <div class="trust-badges">
                  <span>✔ Secure login</span>
                  <span>✔ No spam</span>
                  <span>✔ 24/7 support</span>
                </div>

                <?php if (!session('uid')) : ?>
                  <p class="login-card-footer-text"><?=lang("dont_have_account_yet")?> <a href="<?=cn('auth/signup')?>" class="text-reset"><?=lang("Sign_Up")?></a></p>
                <?php endif; ?> 

                <?php if (!session('uid')) : ?>
                  <nav class="login-card-footer-nav">
                    <a href="<?=cn("auth/forgot_password")?>" class="text-reset"><?=lang("forgot_password")?>?</a>
                  </nav>
                <?php endif; ?>
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