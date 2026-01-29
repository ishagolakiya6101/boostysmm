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
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="text-container">
                            <h1 data-aos="fade-up">Boost Your Social Media Instantly</h1>
                            <p class="p-large" data-aos="fade-up" data-aos-delay="400">India-focused SMM panel with fast INR payments & reliable support.</p>
                            <div class="hero-buttons" data-aos="fade-up" data-aos-delay="600">
                                <?php if (!session('uid')) : ?>
                                    <a class="btn btn-login-green" href="<?=cn('auth/login')?>">Login</a>
                                    <?php if (!get_option('disable_signup_page')) : ?>
                                        <a class="btn btn-signup-blue" href="<?=cn('auth/signup')?>">Sign Up</a>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <a class="btn btn-signup-blue" href="<?=cn('statistics')?>"><?=lang("dashboard")?></a>
                                <?php endif; ?>
                            </div>
                            <div class="trust-badges">
                                <div class="trust-badge">✔ 24/7 Support</div>
                                <div class="trust-badge">✔ Fast Delivery</div>
                                <div class="trust-badge">✔ Secure Payments</div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
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

