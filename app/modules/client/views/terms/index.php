
<style>
  .page-title h1{
    margin-bottom: 5px; }
    .page-title .border-line {
      height: 5px;
      width: 300px;
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
      <?php if (get_theme() === 'nico') : ?>
        <div class="terms-content">
          <p><strong>Terms &amp; Conditions</strong></p>
          <p>Welcome to Boosty SMM Panel.</p>
          <p>By using our services, you agree to the following terms:</p>
          <ol>
            <li><strong>Service Usage</strong> - Our services are only for promotional purposes. We do not guarantee organic engagement.</li>
            <li><strong>No Refund Policy</strong> - Once order is placed, refund is not possible. Make sure to read service description carefully before ordering.</li>
            <li><strong>Order Responsibility</strong> - We are not responsible if: Account is private, Username changed, Post deleted, Wrong link provided.</li>
            <li><strong>Service Delay</strong> - Sometimes services may be slow due to server issues. Please wait patiently.</li>
            <li><strong>Account Safety</strong> - We do not ask for passwords. Never share your login details.</li>
            <li><strong>Cancellation</strong> - Orders once started cannot be cancelled.</li>
            <li><strong>Multiple Orders</strong> - Do not place multiple orders on same link at same time.</li>
            <li><strong>Suspension Rights</strong> - We have full rights to suspend accounts doing: Fraud, Chargeback, Abuse, Fake disputes.</li>
            <li><strong>Disclaimer</strong> - We are not affiliated with Instagram, Facebook, YouTube or any platform.</li>
            <li><strong>Changes</strong> - We can update these terms anytime without notice.</li>
          </ol>
          <p>By using our panel, you accept all these terms.</p>
        </div>
      <?php else : ?>
        <?php echo get_option("terms_content", ""); ?>
      <?php endif; ?>
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


