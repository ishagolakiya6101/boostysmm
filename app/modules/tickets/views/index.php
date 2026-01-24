
<section class="page-title">
  <div class="row justify-content-between">
    <div class="col-md-6">
      <h1 class="page-title d-flex">
        <span class="d-none d-sm-block"><i class="fa fa-comments-o text-primary" aria-hidden="true"></i></span> 
        &nbsp;<?=lang("Tickets")?>
      </h1>
    </div>
    <div class="col-md-3">
      <div class="form-group search-area">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="<?=lang('Search_for_')?>" value="">
            <button class="btn btn-primary btn-square btn-search" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Search" type="button"><span class="fe fe-search"></span></button>
        </div>
      </div>
    </div>
    <div class="col-md-3 text-right">
      <a href="<?=cn($controller_name . "/add")?>" class="btn btn-primary ajaxModal">
        <i class="fe fe-plus"></i> Create New Ticket
      </a>
    </div>
  </div>
</section>

<?php
  $class_element = app_config('template')['form']['class_element'];
  $form_subjects = [
    'subject_order'   => lang("Order"),
    'subject_payment' => lang("Payment"),
    'subject_api'     => lang("API"),
    'subject_other'   => lang("General"),
  ];
  $form_request = [
    'refill'         => lang("Refill"),
    'cancellation'   => lang("Cancellation"),
    'speed_up'       => lang("Speed_Up"),
    'other'          => lang("Other"),
  ];
  $form_payments = [
    'paypal'         => lang("Paypal"),
    'stripe'         => lang("Cancellation"),
    'speed_up'       => lang("Stripe"),
    'other'          => lang("Other"),
  ];

  $elements = [
    [
      'label'      => form_label(lang('Subject')),
      'element'    => form_dropdown('subject', $form_subjects, '', ['class' => $class_element . ' ajaxChangeTicketSubject']),
      'class_main' => "col-md-12 col-sm-12 col-xs-12",
    ],
    [
      'label'      => form_label(lang('Request')),
      'element'    => form_dropdown('request', $form_request, '', ['class' => $class_element]),
      'class_main' => "col-md-12 col-sm-12 col-xs-12 subject-order",
    ],
    [
      'label'      => form_label(lang('order_id') . ' <small class="text-muted">(Optional)</small>'),
      'element'    => form_input(['name' => 'orderid', 'value' => '', 'placeholder' => lang("for_multiple_orders_please_separate_them_using_comma_example_123451234512345"),'type' => 'text', 'class' => $class_element]),
      'class_main' => "col-md-12 col-sm-12 col-xs-12 subject-order",
    ],
    [
      'label'      => form_label(lang('Payment')),
      'element'    => form_dropdown('payment', $form_payments, '', ['class' => $class_element]),
      'class_main' => "col-md-12 col-sm-12 col-xs-12 subject-payment d-none",
    ],
    [
      'label'      => form_label(lang('Transaction_ID')),
      'element'    => form_input(['name' => 'transaction_id', 'value' => '', 'placeholder' => lang("enter_the_transaction_id"),'type' => 'text', 'class' => $class_element]),
      'class_main' => "col-md-12 col-sm-12 col-xs-12 subject-payment d-none",
    ],
    [
      'label'      => form_label(lang("Description")),
      'element'    => form_textarea(['name' => 'description', 'value' => '', 'rows' => '6', 'class' => $class_element]),
      'class_main' => "col-md-12",
    ],
  ];
  $form_url     = cn($controller_name. "/store/");
  $redirect_url = cn($controller_name) ;
  $form_attributes = ['class' => 'form actionForm', 'data-redirect' => $redirect_url, 'method' => "POST"];
?>

<div class="row justify-content-end">
  <div class="col-md-5 d-none d-sm-block">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <h4 class="modal-title"><i class="fe fe-edit"></i> <?=lang("add_new_ticket")?></h4>
        </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>

      <div class="card-body o-auto" style="height: calc(100vh - 180px);">
        <?php echo form_open($form_url, $form_attributes); ?>
          <div class="form-body" id="add_new_ticket">
            <div class="row justify-content-md-center">
              <?php echo render_elements_form($elements); ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary btn-spinner-border btn-block btn-lg mr-1 mb-1"><?=lang('Submit')?></button>
              </div>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="row" id="result_ajaxSearch">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fe fe-list"></i> <?=lang("Lists")?></h3>
            <div class="card-options">
              <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
          </div>
          <div class="card-body o-auto" style="height: calc(100vh - 180px);">
            <?php if(!empty($items)){?>
              <div class="ticket-lists">
                <?php
                  foreach ($items as $key => $item) {
                    $this->load->view('child/index', ['controller_name' => $controller_name, 'item' => $item]);
                  }
                ?>
              </div>
            <?php }else{
              echo '<div class="col-md-12 data-empty text-center">
                <div class="content">
                  <img class="img mb-1" src="'.BASE.'assets/images/ofm-nofiles.png" alt="Empty Data">
                  <div class="title">No support tickets yet. Create a ticket if you need help.</div>
                </div>
              </div>';
            }?>  
          </div>
        </div>
      </div>
      <?php echo show_pagination($pagination); ?> 
    </div>
  </div>
</div>