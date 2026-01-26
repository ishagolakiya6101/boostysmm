<!DOCTYPE html>
<html lang="en">
  <?php 
    include_once 'blocks/head.blade.php';
    $form_url        = cn("auth/ajax_forgot_password");
    $form_attributes = [
      'id'            => 'signUpForm', 
      'data-focus'    => 'false', 
      'class'         => 'actionFormWithoutToast', 
      'data-redirect' => cn('auth/login'), 
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
                <p class="login-card-description"><?=lang("forgot_password")?></p>
                <?php echo form_open($form_url, $form_attributes); ?>
                  <p class="mb-4"><?=lang("enter_your_registration_email_address_to_receive_password_reset_instructions")?></p>
                  <div class="form-group">
                    <label for="email" class="sr-only"><?php echo lang("Email"); ?></label>
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

                  <!-- reCAPCHA -->
                  <?php if (get_option('enable_goolge_recapcha') &&  get_option('google_capcha_site_key') != "" && get_option('google_capcha_secret_key') != "") : ?>
                    <div class="form-group">
                      <div class="g-recaptcha" data-sitekey="<?=get_option('google_capcha_site_key')?>"></div>
                    </div>
                  <?php endif; ?>

                  <div class="form-group mt-20">
                    <div id="alert-message" class="alert-message-reponse"></div>
                  </div>

                  <button class="btn btn-block login-btn btn-submit mb-4" type="submit"><?=lang("Submit")?></button>
                <?php echo form_close(); ?>

                <div class="trust-badges">
                  <span>✔ Secure reset</span>
                  <span>✔ No spam</span>
                  <span>✔ 24/7 support</span>
                </div>

                <p class="login-card-footer-text"><?=lang("already_have_account")?> <a href="<?=cn('auth/login')?>" class="text-reset"><?=lang("Login")?></a></p>
                <nav class="login-card-footer-nav">
                  <a href="<?=cn();?>" class="text-reset"><?=lang('back_to_home');?></a>
                </nav>
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
