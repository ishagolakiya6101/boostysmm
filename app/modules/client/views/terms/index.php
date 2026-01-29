
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
  .page-title {
    text-align: center;
  }
  .page-title h1{
    margin-bottom: 5px; }
    .page-title .border-line {
      height: 5px;
      width: 300px;
      margin: 0 auto;
      background: #eca28d;
      background: -webkit-linear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: -moz- oldlinear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: -o-linear-gradient(45deg, #eca28d, #f98c6b) !important;
      background: linear-gradient(45deg, #eca28d, #f98c6b) !important;
      position: relative;
      border-radius: 30px; }
    .page-title .border-line::before {
      content: '';
      position: absolute;
      left: 0;
      top: -2.7px;
      height: 10px;
      width: 10px;
      border-radius: 50%;
      background: #fa6d7e;
      -webkit-animation-duration: 6s;
      animation-duration: 6s;
      -webkit-animation-timing-function: linear;
      animation-timing-function: linear;
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;
      -webkit-animation-name: moveIcon;
      animation-name: moveIcon; }

  @-webkit-keyframes moveIcon {
    from {
      -webkit-transform: translateX(0);
    }
    to { 
      -webkit-transform: translateX(300px);
    }
  }
</style>

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="page-title m-b-30">
      <h1>
        <?php echo lang('Terms__Privacy_Policy'); ?>
      </h1>
      <div class="border-line"></div>
    </div>
    <div class="content">
      <div class="title">
        <h2><?=lang("Terms")?></h2>
      </div>
      <?php echo get_option("terms_content", ""); ?>
    </div>
  </div> 

  <div class="col-md-8">
    <div class="content m-t-30">
      <div class="title">
        <h2><?=lang("Privacy_Policy")?></h2>
      </div>
      <?php echo get_option("policy_content", ""); ?>
    </div>
  </div> 

</div>


