<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" >
    <meta name="description" content="<?=get_option('website_desc', "SmartPanel - #1 SMM Reseller Panel - Best SMM Panel for Resellers. Also well known for TOP SMM Panel and Cheap SMM Panel for all kind of Social Media Marketing Services. SMM Panel for Facebook, Instagram, YouTube and more services!")?>">
    <meta name="keywords" content="<?=get_option('website_keywords', "smm panel, SmartPanel, smm reseller panel, smm provider panel, reseller panel, instagram panel, resellerpanel, social media reseller panel, smmpanel, panelsmm, smm, panel, socialmedia, instagram reseller panel")?>">
    <title><?=get_option('website_title', "SmartPanel - SMM Panel Reseller Tool")?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?=get_option('website_favicon', BASE."assets/images/favicon.png")?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?=BASE?>assets/js/vendors/jquery-3.2.1.min.js"></script>
    <!-- Core -->
    <link href="<?=BASE?>assets/css/core.css" rel="stylesheet">
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?=BASE?>assets/plugins/jquery-toast/css/jquery.toast.css">
    <link rel="stylesheet" href="<?=BASE?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
    <link href="<?=BASE?>assets/css/util.css" rel="stylesheet">
    <link href="<?=BASE?>assets/css/general_page.css" rel="stylesheet">
    <link href="<?=BASE?>assets/css/layout.css" rel="stylesheet">
    <link href="<?=BASE?>assets/css/footer.css" rel="stylesheet">

    <script type="text/javascript">
      var token = '<?=$this->security->get_csrf_hash()?>',
          PATH  = '<?=PATH?>',
          BASE  = '<?=BASE?>';
      var    deleteItem = '<?=lang("Are_you_sure_you_want_to_delete_this_item")?>';
      var    deleteItems = '<?=lang("Are_you_sure_you_want_to_delete_all_items")?>';
    </script>
    <?=htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES)?>
  </head>
  <body>
    <style>
      .navbar-custom {
      background: #ffffff;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
  }
  .header {
      background: radial-gradient(circle at top left, rgba(59, 130, 246, 0.10), transparent 55%),
                  radial-gradient(circle at top right, rgba(34, 197, 94, 0.08), transparent 60%);
  }
  .header .text-container h1,
  .section-header .h2-heading,
  .section-header h2 {
      color: #0f172a;
  }
  .header .text-container .p-large {
      color: #475569;
  }
  .btn-login-green {
      background: #22c55e;
      border-color: #22c55e;
      color: #ffffff !important;
  }
  .btn-signup-blue {
      background: #3b82f6;
      border-color: #3b82f6;
      color: #ffffff !important;
  }
  .btn-login-green:hover,
  .btn-signup-blue:hover {
      filter: brightness(1.05);
  }
  .hero-buttons .btn {
      margin-right: 12px;
      margin-bottom: 8px;
      border-radius: 8px;
      padding: 12px 22px;
      font-weight: 600;
  }
  .header {
      padding-bottom: 5px;
  }
  .header .header-content {
      padding-top: 3rem !important;
      padding-bottom: 3rem !important;
  }
  .section-header {
      margin-bottom: 12px;
  }
  .navbar {
    background: #ffffff;
    width: 100%;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
  }
    </style>
    <!-- Start page_overplay -->
    <?php
      include_once(APPPATH . 'views/layouts/common/page_overplay.php');
    ?>
    <!-- Start header_nav -->
    <?php
      $header_nav_elements = app_config('client')['header_nav'];
      if (!get_option('enable_service_list_no_login', 0)) unset($header_nav_elements['services']);
      if (!get_option('enable_api_tab', 0)) unset($header_nav_elements['api']);
      if (!is_table_exists(BLOG_CATEGORIES)) unset($header_nav_elements['blog']);
      $xhtml_header_nav = '<ul class="navbar-nav ml-auto">';
      foreach ($header_nav_elements as $key => $item_li) {
        $item_li_name = lang($item_li['name']);
        $class_active = ($item_li['route-name'] == segment(1)) ? 'active' : '';
        $link = cn($item_li['route-name']);
        $xhtml_header_nav .= sprintf(
          '<li class="nav-item %s">
            <a class="nav-link js-scroll-trigger" href="%s">%s</a>
          </li>', $class_active, $link, lang($item_li['name']));
      }
      $xhtml_header_nav .= '</ul>';
    ?>
    <header class="header fixed-top" id="headerNav">
          <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <?php
                $logo_area_html = '';
                if ($default_nico_theme_type == 'dark') {
                    $logo_url = get_option('website_logo_white', BASE."assets/images/logo_white.png");
                } else {
                    $logo_url = get_option('website_logo', BASE."assets/images/logo.png");
                }
                $logo_area_html = sprintf(
                    '<a class="navbar-brand logo-image" href="%s">
                        <img src="%s" alt="%s">
                    </a> ', cn(), $logo_url, get_option('website_name')
                );
                echo $logo_area_html;
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <?php echo render_header_nav_ul(); ?>
                <span class="nav-item">
                <?php 
                    if (!session('uid')) {
                    ?>
                    <a class="btn btn-login btn-login-green" href="<?=cn('auth/login')?>">Login</a>
                    <?php if (!get_option('disable_signup_page')) { ?>
                        <a class="btn btn-signup-blue btn-getstarted" href="<?=cn('auth/signup')?>">Sign Up</a>
                    <?php }; ?>
                    <?php } else {?>
                    <a class="btn btn-signup-blue btn-getstarted" href="<?=cn('statistics')?>"><?=lang("dashboard")?></a>
                    <?php } ?>
                </span>
            </div>
        </div>
    </nav> 
      <!-- <div class="container">
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand" href="<?=cn()?>">
            <img class="site-logo" src="<?=get_option('website_logo', BASE."assets/images/logo.png")?>" alt="Webstie logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fe fe-menu"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php echo render_header_nav_ul(); ?>
            <div class="nav-item d-md-flex btn-login-signup">
              <?php 
                if (!session('uid')) {
              ?>
                <a class="link btn-login" href="<?=cn('auth/login')?>"><?=lang("Login")?></a>
                <a href="<?=cn('auth/signup')?>" class="btn btn-pill btn-outline-primary sign-up"><?=lang("Sign_Up")?></a>
              <?php } else {?>
                <a href="<?=cn('statistics')?>" class="btn btn-pill btn-outline-primary btn-statistics text-uppercase"><?=lang("statistics")?></a>
              <?php }?>
            </div>
          </div>
        </nav>
      </div> -->
    </header>

    <div class="page p-t-70">
      <div class="page-main">
        <div class="my-3 my-md-5">
          <div class="container">
            <?=$template['body']?>
          </div>
        </div>
        <div id="modal-ajax" class="modal fade" tabindex="-1"></div>
      </div>
    </div>
    <?php 
      include_once 'common/blocks/footer.php';
    ?>            
    <script src="<?=BASE?>assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?=BASE?>assets/js/vendors/jquery.sparkline.min.js"></script>
    <script src="<?=BASE?>assets/js/core.js"></script>
    <!-- general JS -->
    <script src="<?=BASE?>assets/js/process.js"></script>
    <script src="<?=BASE?>assets/js/general.js"></script>
  </body>
</html>

