
<style>
  .tickets-number{
    font-size: 14px !important;
  }
</style>

<?php
  $CI = &get_instance();
  $CI->load->model('model');
  $total_unread_tickets = $CI->model->count_results('id', TICKETS, ['user_read' => 1, 'uid' => session('uid')]);
  $user = current_logged_user();
  $user_name = $user ? $user->first_name : '';
  $user_balance = $user && isset($user->balance) ? (float)$user->balance : 0;
  $user_balance_inr = '₹' . number_format($user_balance, 2);
  $avatar_url = BASE . 'assets/admin/dist/images/user-avatar.png';

  $sidebar_items = [
    ['key' => 'statistics',   'label' => 'Dashboard',        'icon' => 'fe fe-home',          'route' => 'statistics'],
    ['key' => 'new_order',    'label' => 'New Order',        'icon' => 'fe fe-shopping-cart', 'route' => 'new_order'],
    ['key' => 'order',        'label' => 'My Orders',        'icon' => 'fe fe-clipboard',     'route' => 'order'],
    ['key' => 'services',     'label' => 'Services',         'icon' => 'fe fe-grid',          'route' => 'services'],
    ['key' => 'tickets',      'label' => 'Support',          'icon' => 'fe fe-message-circle','route' => 'tickets'],
    ['key' => 'add_funds',    'label' => 'Add Funds',        'icon' => 'fe fe-credit-card',   'route' => 'add_funds'],
    ['key' => 'transactions', 'label' => 'Transaction Logs', 'icon' => 'fe fe-file-text',     'route' => 'transactions'],
    ['key' => 'profile',      'label' => 'Settings',         'icon' => 'fe fe-settings',      'route' => 'profile'],
    ['key' => 'logout',       'label' => 'Logout',           'icon' => 'fe fe-log-out',       'route' => 'auth/logout'],
  ];

  $xhtml = '<ul class="navbar-nav mb-md-4 sidebar-menu" id="menu">';
  foreach ($sidebar_items as $item) {
    $route_name = $item['route'];
    $is_support = $item['key'] === 'tickets';
    $is_logout = $item['key'] === 'logout';
    $is_active = (!$is_logout && ($route_name === segment(1) || ($is_support && in_array(segment(1), ['tickets', 'faq'])))) ? 'active' : '';
    $support_badge = '';
    if ($is_support && $total_unread_tickets > 0) {
      $support_badge = sprintf('<span class="badge badge-support support-badge--pulse">%s</span>', $total_unread_tickets);
    }
    $xhtml .= sprintf(
      '<li class="nav-item">
        <a class="nav-link %s" href="%s" data-toggle="tooltip" data-placement="right" title="%s">
          <span class="nav-icon">
            <i class="%s"></i>
          </span>
          <span class="nav-text">
            <span class="nav-label">%s</span>
            %s
          </span>
        </a>
      </li>',
      $is_active,
      cn($route_name),
      $item['label'],
      $item['icon'],
      $item['label'],
      $support_badge
    );
  }
  $xhtml .= '</ul>';
?>
<aside class="navbar navbar-side navbar-fixed js-sidebar" id="aside">
  <div class="mobile-logo">
    <a href="<?php echo cn('statistics'); ?>" class="navbar-brand text-inherit">
      <img src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" alt="Website Logo" class="hide-navbar-folded navbar-brand-logo">
      <img src="<?=get_option('website_logo_mark', BASE."assets/images/logo.png")?>" alt="Website Logo" class="hide-navbar-expanded navbar-brand-logo">
    </a>
    <button type="button" class="sidebar-close d-lg-none" aria-label="Close sidebar">
      <i class="fe fe-x"></i>
    </button>
  </div>
  <div class="sidebar-user-card">
    <div class="sidebar-user-avatar" style="background-image: url('<?=esc($avatar_url)?>');"></div>
    <div class="sidebar-user-text">
      <span class="sidebar-user-greet">Hi, <?=esc($user_name)?> 👋</span>
      <span class="sidebar-user-balance">Wallet Balance: <?=esc($user_balance_inr)?></span>
    </div>
  </div>
  <div class="flex-fill scroll-bar">
    <?=$xhtml?>
  </div>
</aside>