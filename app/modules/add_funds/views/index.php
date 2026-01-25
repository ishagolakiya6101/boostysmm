<?php
  $has_active = !empty($active_payments);
?>
<section class="add-funds m-t-30">   
  <div class="container-fluid">
    <div class="row justify-content-md-center" id="result_ajaxSearch">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <div class="tabs-list">
              <ul class="nav nav-tabs">
                <?php
                  $i = 0;
                  if (!empty($active_payments)) {
                    foreach ($active_payments as $row) {
                      if ($row) {
                        $i++;
                ?>
                <li class="m-t-10">
                  <a class="<?php echo ($i == 1) ? 'active show' : '' ?>"
                     data-toggle="tab"
                     href="#<?php echo $row['type']; ?>">
                    <i class="fa fa-credit-card"></i> <?= esc($row['name']); ?>
                  </a>
                </li>
                <?php } } } ?>
                
                <!-- QR Payment Tab -->
                <li class="m-t-10">
                  <a class="<?php echo (!$has_active) ? 'active show' : '' ?>"
                     data-toggle="tab"
                     href="#qr_payment">
                    <i class="fa fa-qrcode"></i> QR Payment
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="card-body">
            <div class="tab-content">

              <?php
                $i = 0;
                if (!empty($active_payments)) {
                  foreach ($active_payments as $row) {
                    $i++;
              ?>
              <div id="<?php echo $row['type']; ?>"
                   class="tab-pane fade <?php echo ($i == 1) ? 'in active show' : ''; ?>">
                <?php
                  $this->load->view(
                    $row['type'].'/index',
                    [
                      'payment_id'     => $row['id'],
                      'payment_params' => $row['params']
                    ]
                  );
                ?>
              </div>
              <?php } } ?>

              <!-- QR Payment Content -->
              <div id="qr_payment"
                   class="tab-pane fade <?php echo (!$has_active) ? 'in active show' : ''; ?>">
                <div class="add-funds-form-content">
                  <form class="form"
                        action="<?php echo base_url('add_funds/qr_payment/index'); ?>"
                        method="POST"
                        enctype="multipart/form-data">

                    <input type="hidden"
                           name="<?php echo $this->security->get_csrf_token_name(); ?>"
                           value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <div class="row">
                      <div class="col-md-12 text-center">
                        <img src="<?php echo BASE; ?>/assets/images/qr_code.png"
                             alt="QR Code"
                             style="max-width:200px;">
                        <p class="p-t-10">
                          <small><?php echo lang("scan_the_qr_code_to_make_payment_then_upload_screenshot"); ?></small>
                        </p>
                        <p class="text-success font-weight-bold">UPI / PhonePe / Google Pay accepted</p>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Amount (INR)</label>
                          <input class="form-control square"
                                 type="number"
                                 name="amount"
                                 min="100"
                                 max="50000"
                                 placeholder="min: 100, max: 50000"
                                 required>
                        </div>

                        <div class="form-group">
                          <label><?php echo lang("upload_screenshot"); ?></label>
                          <input type="file"
                                 class="form-control"
                                 name="screenshot"
                                 accept="image/*"
                                 required>
                        </div>

                        <div class="form-group">
                          <label><?php echo lang("note"); ?></label>
                          <ul>
                            <li><?php echo lang("Minimal_payment"); ?>: <strong>₹ 100</strong></li>
                            <li><?php echo lang("Maximal_payment"); ?>: <strong>₹50,000</strong></li>
                            <li><?php echo lang("upload_screenshot_after_payment"); ?></li>
                            <li>Payment received. Balance will be added after admin verification (5–30 minutes).</li>
                          </ul>
                        </div>

                        <div class="form-group">
                          <label class="custom-control custom-checkbox">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   name="agree"
                                   value="1"
                                   required>
                            <span class="custom-control-label">
                              <strong>I have completed the payment and uploaded screenshot</strong>
                            </span>
                          </label>
                        </div>

                        <input type="hidden" name="payment_id" value="0">

                        <button type="submit"
                                class="btn btn-primary btn-min-width">
                          <?php echo lang("Submit"); ?>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<style>
.page-title h1 { margin-bottom:5px; }
.page-title .border-line {
  height:5px;width:270px;
  background:linear-gradient(45deg,#eca28d,#f98c6b);
  border-radius:30px;position:relative;
}
.page-title .border-line::before{
  content:'';position:absolute;left:0;top:-2.7px;
  height:10px;width:10px;border-radius:50%;
  background:#fa6d7e;animation:moveIcon 6s linear infinite;
}
@keyframes moveIcon {
  from { transform:translateX(0); }
  to { transform:translateX(215px); }
}
</style>

<?php if (get_option("is_active_manual")) { ?>
<section class="add-funds m-t-30">
  <div class="container-fluid">
    <div class="row justify-content-center m-t-50">
      <div class="col-md-8">
        <div class="page-title m-b-30">
          <h1><i class="fa fa-hand-o-right"></i> <?php echo lang('manual_payment'); ?></h1>
          <div class="border-line"></div>
        </div>
        <div class="content m-t-30">
          <?php echo htmlspecialchars_decode(get_option('manual_payment_content', ''), ENT_QUOTES); ?>
          <div class="alert alert-info mt-3">
            <strong>UPI / PhonePe / Google Pay accepted</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
