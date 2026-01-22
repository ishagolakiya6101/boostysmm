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
<section class="sign-up-form auth-page">
  <div class="container">
    <div class="auth-split">
      <div class="auth-brand">
        <a class="auth-logo" href="<?=cn()?>">
          <img src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" alt="BoostySMM logo">
        </a>
        <h2>Grow your social media with BoostySMM</h2>
        <p>Fast, affordable & trusted SMM services</p>
      </div>
      <div class="auth-card">
        <h1>Create Your Account</h1>
        <p class="auth-subtitle">Start boosting your social presence today</p>
        <div class="form-container">
          <?php echo form_open($form_url, $form_attributes); ?>
            <div class="form-group input-with-icon">
                <span class="input-icon"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control-input" name="email" placeholder="Enter your email" required>
                <label class="label-control" for="semail"><?php echo lang("Email"); ?></label>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control-input" name="first_name" required>
                <label class="label-control" for="sname"><?php echo lang("first_name"); ?></label>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control-input" name="last_name" required>
                <label class="label-control" for="sname"><?php echo lang("last_name"); ?></label>
                <div class="help-block with-errors"></div>
            </div>

            <?php
                if (get_option('enable_signup_skype_field')) {
            ?>
              <div class="form-group">
                <input type="text" class="form-control-input" name="skype_id" required>
                <label class="label-control" for="sname"><?php echo lang("Skype_id"); ?></label>
              </div>
            <?php } ?>

            <?php
                if (get_option('enable_signup_whatsapp_field')) {
            ?>
              <div class="form-group">
                <input type="text" class="form-control-input" name="whatsapp" required>
                <label class="label-control" for="sname"><?php echo lang("Whatsapp"); ?></label>
              </div>
            <?php } ?>

            <div class="form-group input-with-icon">
                <span class="input-icon"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control-input" name="password" placeholder="Create password" required>
                <label class="label-control" for="spassword"><?php echo lang("Password"); ?></label>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group input-with-icon">
                <span class="input-icon"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control-input" name="re_password" placeholder="Confirm password" required>
                <label class="label-control" for="spassword"><?php echo lang("Confirm_password"); ?></label>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <select  name="timezone" class="form-control square">
                <?php $time_zones = tz_list();
                  if (!empty($time_zones)) {
                    $location = get_location_info_by_ip(get_client_ip());
                    $user_timezone = $location->timezone;
                    if ($user_timezone == "" || $user_timezone == 'Unknow') {
                      $user_timezone = get_option("default_timezone", 'UTC');
                    }
                    foreach ($time_zones as $key => $time_zone) {
                ?>
                <option value="<?=$time_zone['zone']?>" <?=($user_timezone == $time_zone["zone"])? 'selected': ''?>><?=$time_zone['time']?></option>
                <?php }}?>
              </select>
            </div>
            <div class="form-group mt-20">
              <div id="alert-message" class="alert-message-reponse"></div>
            </div>
            <?php
              if (get_option('enable_goolge_recapcha') &&  get_option('google_capcha_site_key') != "" && get_option('google_capcha_secret_key') != "") {
            ?>
            <div class="form-group">
              <div class="g-recaptcha" data-sitekey="<?=get_option('google_capcha_site_key')?>"></div>
            </div>
            <?php } ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group checkbox auth-terms">
                  <input type="checkbox"  name="terms">
                  <label class="">I agree to <a href="<?=cn('terms')?>">Terms & Conditions</a> &amp; <a href="<?=cn('terms')?>">Privacy Policy</a></label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="form-control-submit-button btn-submit auth-submit">Create Account</button>
            </div>
            
            <?php echo $social_login_html; ?>  

          <?php echo form_close(); ?>
          <div class="text-center text-muted auth-redirect">
            <span>Already have an account?</span> <a href="<?=cn('auth/login')?>">Login here</a>
          </div>
          <div class="auth-trust">
            <span>✔ Secure login</span>
            <span>✔ No spam</span>
            <span>✔ 24/7 support</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
  include_once 'blocks/script.blade.php';
?>