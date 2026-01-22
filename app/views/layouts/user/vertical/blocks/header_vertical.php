<style>
  .search-box div.form-group{
    margin-bottom: 0px !important;
  }
  .search-box .form-control {
    height: auto !important;
  }
</style>

<?php
  $balance = current_logged_user()->balance;
  if (empty($balance) || $balance == 0) {
    $balance = 0.00;
  }
  $current_balance_inr = '₹' . number_format((float)$balance, 2);
  $user_name = current_logged_user()->first_name;
  $avatar_url = BASE . 'assets/admin/dist/images/user-avatar.png';
?>

<header class="navbar navbar-expand-xl js-header">
  <div class="header-wrap">

    <a class="navbar-toggler mobile-menu">
      <span class="navbar-toggler-icon"><i class="icon fe fe-menu"></i></span>
    </a>

    <a href="<?php echo cn(); ?>" class="navbar-brand text-inherit mr-md-3">
      <img src="<?php echo get_option('website_logo', BASE.'assets/images/logo.png'); ?>" alt="Website Logo" class="d-md-none navbar-brand-logo">
    </a>
    
    <ul class="nav navbar-menu align-items-center order-1 order-lg-2">
      <?php
        if (session('sid') && session('uid')) {
      ?>
      <li class="nav-item">
        <a class="nav-link ajaxViewUser" href="<?=cn("back-to-admin")?>" >
          <span class="nav-icon">
            <i class="icon fe fe-log-out" data-toggle="tooltip" data-placement="bottom" title="<?=lang('Back_to_Admin')?>"></i>
          </span>
        </a>
      </li>
      <?php }?>

      <?php
        $redirect = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->load->model('model');
        $items_languages = $this->model->fetch('id, ids, country_code, code, is_default', LANGUAGE_LIST, ['status' => 1]);
        $lang_current = get_lang_code_defaut();
      ?>
      <li class="nav-item dropdown-lang dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <span class="flag-icon flag-icon-<?php echo strtolower($lang_current->country_code); ?>"></span> 
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
          <?php 
            foreach ($items_languages as $key => $item) {
          ?>
          <a class="dropdown-item ajaxChangeLanguageSecond" href="javascript:void(0)" data-url="<?php echo cn('set-language'); ?>" data-redirect="<?php echo strip_tags($redirect); ?>" data-ids="<?php echo strip_tags($item->ids); ?>"><i class="flag-icon flag-icon-<?php echo strtolower($item->country_code); ?>"></i> <?php echo language_codes($item->code); ?>
          </a>
          <?php }?>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center py-0 px-lg-0 px-2 text-color">
          <span class="avatar user-avatar m-l-10" style="background-image: url('<?=esc($avatar_url)?>');"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
          <div class="dropdown-item-text small text-muted"><?=lang('Hi')?>, <?=esc($user_name)?> · <?=esc($current_balance_inr)?></div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo cn('profile'); ?>">
            <i class="icon fe fe-user dropdown-icon"></i>
            <?php echo lang('Profile'); ?>
          </a>
          <a class="dropdown-item" href="<?php echo cn('profile'); ?>">
            <i class="icon fe fe-settings dropdown-icon"></i>
            <?php echo lang('Settings'); ?>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo cn('auth/logout'); ?>">
            <i class="icon fe fe-log-out dropdown-icon"></i>
            <?php echo lang('Logout'); ?>
          </a>
        </div>
      </li>
    </ul>
  </div>
</header>