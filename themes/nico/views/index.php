<?php
    $default_nico_theme_type = get_option('default_nico_type', 'light');
?>

<!DOCTYPE html>
<html lang="en">
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
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <script src="<?php echo BASE; ?>assets/js/vendors/jquery-3.2.1.min.js"></script>
    <link href="<?php echo BASE; ?>themes/nico/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>themes/nico/assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>themes/nico/assets/css/swiper.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/plugins/aos/dist/aos.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/plugins/lineicons/web-font-files/lineicons.css" rel="stylesheet">
	<link href="<?php echo BASE; ?>themes/nico/assets/css/styles.css" rel="stylesheet">
    <?php if ($default_nico_theme_type == 'dark') : ?>
	    <link href="<?php echo BASE; ?>themes/nico/assets/css/dark.css" rel="stylesheet">
    <?php endif; ?>
    <style>
        body {
            font-family: "Poppins", "Inter", "Montserrat", sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }
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
            margin-bottom: 12px;
            border-radius: 8px;
            padding: 12px 22px;
            font-weight: 600;
        }
        .trust-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }
        .trust-badge {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 14px;
            color: #1e293b;
        }
        .why-choose-us .box,
        .work-process-area .single_work_step,
        .services-preview .service-card,
        .contact-strip .contact-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
        }
        .services-preview .service-card {
            padding: 20px 12px;
            text-align: center;
            margin-bottom: 16px;
        }
        .services-preview .service-card i {
            font-size: 28px;
            color: #2563eb;
            margin-bottom: 8px;
        }
        .contact-strip .contact-card {
            padding: 18px;
            text-align: center;
        }
        section {
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .header {
            padding-top: 30px;
            padding-bottom: 5px;
        }
        .header .header-content {
            padding-top: 5rem !important;
            padding-bottom: 5rem !important;
        }
        .section-header {
            margin-bottom: 24px;
        }
        .why-choose-us,
        .services-preview,
        .work-process-area {
            padding-top: 24px;
            padding-bottom: 24px;
        }
        .why-choose-us .section-header,
        .services-preview .section-header,
        .work-process-area .section-header {
            margin-bottom: 16px;
        }
        .services-preview .row,
        .why-choose-us .row,
        .work-process-area .row {
            row-gap: 16px;
        }
        .footer {
            background: #0b0f19;
        }
        .footer a {
            color: #cbd5f5;
        }
        .footer-bottom {
            border-top: 1px solid #1f2937;
        }
    </style>
	<!-- Favicon  -->
    <link rel="icon" href="<?php echo BASE; ?>themes/nico/assets/images/favicon.png">
    <script type="text/javascript">
      var token = '<?=$this->security->get_csrf_hash()?>',
          PATH  = '<?php echo PATH; ?>',
          BASE  = '<?php echo BASE; ?>';
      var    deleteItem  = '<?php echo lang("Are_you_sure_you_want_to_delete_this_item"); ?>';
      var    deleteItems = '<?php echo lang("Are_you_sure_you_want_to_delete_all_items"); ?>';
    </script>
    <?php echo htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES); ?>
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

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
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="text-container">
                            <h1 data-aos="fade-up">Boost Your Social Media Instantly</h1>
                            <p class="p-large" data-aos="fade-up" data-aos-delay="400">Affordable & fast SMM services for Instagram, YouTube, Telegram & more.</p>
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
                    <div class="col-lg-6 col-xl-6">
                        <div class="image-container" data-aos="zoom-out" data-aos-delay="200">
                            <div class="img-wrapper">
                                <img class="img-fluid" src="<?php echo BASE; ?>themes/nico/assets/images/home/header-hero.png" alt="Social media growth illustration">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- why-choose-us -->
    <section class="why-choose-us" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 section-header">
                    <div class="above-heading" data-aos="fade-up" data-aos-delay="200"><?php echo lang("why_choose_us"); ?></div>
                    <h2 class="h2-heading"  data-aos="fade-up" data-aos-delay="400">Why BoostySMM?</h2>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="600">
                  <div class="box">
                    <img src="<?php echo BASE; ?>themes/nico/assets/images/home/great-quality.png" class="img-fluid" alt="">
                    <h3>Cheapest prices in India</h3>
                    <p>Lowest rates without compromising on service.</p>
                  </div>
                </div>
      
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="800">
                  <div class="box">
                    <img src="<?php echo BASE; ?>themes/nico/assets/images/home/payment-methods.png" class="img-fluid" alt="">
                    <h3>Real quality services</h3>
                    <p>Consistent, reliable results you can trust.</p>
                  </div>
                </div>
      
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="1000">
                  <div class="box">
                    <img src="<?php echo BASE; ?>themes/nico/assets/images/home/shoking-prices.png" class="img-fluid" alt="">
                    <h3>Instant order start</h3>
                    <p>Most orders begin within minutes.</p>
                  </div>
                </div>
      
                <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="1200">
                  <div class="box">
                    <img src="<?php echo BASE; ?>themes/nico/assets/images/home/unbelievable-prices.png" class="img-fluid" alt="">
                    <h3>Trusted panel</h3>
                    <p>Secure, stable, and used by thousands.</p>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <!-- services preview -->
    <section class="services-preview" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 section-header" data-aos="fade-up" data-aos-delay="200">
                    <div class="above-heading">Services Preview</div>
                    <h2 class="h2-heading">Main platforms we support</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md service-card" data-aos="zoom-out" data-aos-delay="200">
                    <i class="fab fa-instagram"></i>
                    <h3>Instagram</h3>
                </div>
                <div class="col-6 col-md service-card" data-aos="zoom-out" data-aos-delay="300">
                    <i class="fab fa-youtube"></i>
                    <h3>YouTube</h3>
                </div>
                <div class="col-6 col-md service-card" data-aos="zoom-out" data-aos-delay="400">
                    <i class="fab fa-telegram-plane"></i>
                    <h3>Telegram</h3>
                </div>
                <div class="col-6 col-md service-card" data-aos="zoom-out" data-aos-delay="500">
                    <i class="fab fa-snapchat-ghost"></i>
                    <h3>Snapchat</h3>
                </div>
                <div class="col-6 col-md service-card" data-aos="zoom-out" data-aos-delay="600">
                    <i class="fab fa-facebook-f"></i>
                    <h3>Facebook</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- work-process-area -->
    <section class="work-process-area" data-aos="fade-up">
        <div class="container">
          <div class="row  justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12 col-sm-8 col-lg-6">
              <header class="section-header">
                <h2>How it works</h2>
                <p>Get started in four simple steps.</p>
              </header>
            </div>  
          </div>
          <div class="row justify-content-between">
              <div class="col-12 col-sm-3 col-md-3" data-aos="fade-up" data-aos-delay="300">
                  <div class="single_work_step">
                      <div class="step-icon"><i>1</i></div>
                      <h5>Create account</h5>
                      <p>Sign up and log in to your panel.</p>
                  </div>
              </div>
              <div class="col-12 col-sm-3 col-md-3" data-aos="fade-up" data-aos-delay="400">
                  <div class="single_work_step">
                      <div class="step-icon"><i>2</i></div>
                      <h5>Add funds</h5>
                      <p>Top up your wallet securely.</p>
                  </div>
              </div>
              <div class="col-12 col-sm-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
                  <div class="single_work_step">
                      <div class="step-icon"><i>3</i></div>
                      <h5>Place order</h5>
                      <p>Choose a service and submit your order.</p>
                  </div>
              </div>
              <div class="col-12 col-sm-3 col-md-3" data-aos="fade-up" data-aos-delay="600">
                  <div class="single_work_step">
                      <div class="step-icon"><i>4</i></div>
                      <h5>Get results</h5>
                      <p>Track progress and see the growth.</p>
                  </div>
              </div>
          </div>
        </div>
    </section>

    <!-- contact -->
    <section class="contact-strip" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 section-header">
                    <div class="above-heading">Contact</div>
                    <h2 class="h2-heading">Need help? We're here.</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 contact-card">
                    <h4>Telegram Support</h4>
                    <a href="<?=get_option('telegram_link', 'https://t.me/boostysmm_support')?>" target="_blank" rel="noopener">t.me/boostysmm_support</a>
                </div>
                <div class="col-md-4 contact-card">
                    <h4>WhatsApp Support</h4>
                    <a href="<?=get_option('whatsapp_link', 'https://wa.me/919999999999')?>" target="_blank" rel="noopener"><?=get_option('whatsapp_number', '+91 99999 99999')?></a>
                </div>
                <div class="col-md-4 contact-card">
                    <h4>Support Email</h4>
                    <a href="mailto:<?=get_option('support_email', 'support@boostysmm.com')?>"><?=get_option('support_email', 'support@boostysmm.com')?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer id="footer" class="footer">
        <div class="container">
          <div class="row footer-top">
            <div class="col-lg-6 col-md-12 footer-info" id="about-us">
                <a href="<?=cn()?>" class="logo d-flex align-items-center">
                    <img src="<?=get_option('website_logo_white', BASE."assets/images/logo_white.png")?>" alt="<?php echo get_option('website_name'); ?>">
                </a>
              <p>BoostySMM is a premium SMM panel offering fast, reliable, and affordable growth for your social media.</p>
            </div>
            <div class="col-lg-6 footer-links">
              <h4>Quick Links</h4>
              <ul>
                <li><a href="#about-us">About us</a></li>
                <li><a href="<?= cn('terms'); ?>">Terms &amp; Conditions</a></li>
                <li><a href="<?= cn('terms'); ?>#privacy">Privacy Policy</a></li>
                <li><a href="<?= cn('terms'); ?>#refund">Refund Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="wrapper footer-bottom">
            <div class="copyrights">
              <p>© BoostySMM</p>
            </div>
          </div>
        </div>
    </footer>
    
    <div class="modal-infor">
      <div class="modal" id="notification">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title"><i class="fe fe-bell"></i> <?=lang("Notification")?></h4>
              <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <?=get_option('notification_popup_content')?>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang("Close")?></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Vendor -->
    <script src="<?php echo BASE; ?>assets/plugins/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/aos/dist/aos.js"></script>
    <script src="<?php echo BASE; ?>themes/nico/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE; ?>themes/nico/assets/js/jquery.easing.min.js"></script> 
    <script src="<?php echo BASE; ?>themes/nico/assets/js/swiper.min.js"></script>
    <script src="<?php echo BASE; ?>themes/nico/assets/js/scripts.js"></script>

    <!-- Script js -->
    <script src="<?php echo BASE; ?>assets/js/process.js"></script>
    <script src="<?php echo BASE; ?>assets/js/general.js"></script>
    <?=htmlspecialchars_decode(get_option('embed_javascript', ''), ENT_QUOTES)?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        /**
         * Initiate Pure Counter 
         */
        new PureCounter();

        /**
         * Animation on scroll
         */
        function aos_init() {
            AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false
            });
        }
        window.addEventListener('load', () => {
            aos_init();
        });
        
    </script>
    <script>
        $(document).ready(function(){
            var is_notification_popup = "<?=get_option('enable_notification_popup', 0)?>"
            setTimeout(function(){
                if (is_notification_popup == 1) {
                $("#notification").modal('show');
                }else{
                $("#notification").modal('hide');
                }
            },500);
        });
    </script>
    
</body>
</html>