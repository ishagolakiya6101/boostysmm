   <style>
  .footer {
    color: #ffffffa6;
    background: #0b0f19;
    padding-top: 60px;
  }
  .footer .logo img {
      max-height: 45px;
      width: auto;
      margin-bottom: 20px;
  }
  .footer a {
      color: #cbd5f5 !important;
      text-decoration: none;
  }
  .footer a:hover {
      color: #ffffff !important;
  }
  .footer h4 {
      color: #ffffff;
      margin-bottom: 20px;
  }
  .footer ul {
      list-style: none;
      padding: 0;
  }
  .footer ul li {
      margin-bottom: 10px;
  }
  .footer-bottom {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid #1f2937;
  }
</style>
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