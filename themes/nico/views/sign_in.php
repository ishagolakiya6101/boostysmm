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
              <p class="login-card-description"><?=lang("login_to_your_account")?></p>
              <p class="auth-subtitle">Welcome back, let's grow together</p>
              <?php echo form_open($form_url, $form_attributes); ?>
                <div class="form-group input-with-icon">
                  <span class="input-icon"><i class="fas fa-envelope"></i></span>
                  <label for="email" class="sr-only"><?php echo lang("Email"); ?></label>
                  <input type="email" name="email" id="email" class="form-control" value="<?=(isset($cookie_email) && $cookie_email != "") ? $cookie_email : '' ?>" placeholder="Enter your email">
                </div>
                <div class="form-group input-with-icon">
                  <span class="input-icon"><i class="fas fa-lock"></i></span>
                  <label for="password" class="sr-only"><?php echo lang("Password"); ?></label>
                  <input type="password" name="password" id="password" class="form-control" value="<?=(isset($cookie_pass) && $cookie_pass != "") ? $cookie_pass : ""?>" placeholder="Enter your password">
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

                  <button class="btn btn-block login-btn btn-submit mb-4 auth-submit" type="submit"><?=lang("Login")?></button>
                  <?php echo $social_login_html?>

                <?php echo form_close(); ?>

                <?php if (!session('uid')) : ?>
                  <p class="login-card-footer-text auth-redirect">
                    <span>Don't have an account?</span> <a href="<?=cn('auth/signup')?>">Create one</a>
                  </p>
                <?php endif; ?> 

                <?php if (!session('uid')) : ?>
                  <nav class="login-card-footer-nav">
                    <a href="<?=cn("auth/forgot_password")?>" class="text-reset"><?=lang("forgot_password")?>?</a>
                  </nav>
                <?php endif; ?>
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