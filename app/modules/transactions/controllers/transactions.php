<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class transactions extends My_UserController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(get_class($this).'_model', 'main_model');

        $this->controller_name   = strtolower(get_class($this));
        $this->controller_title  = ucfirst(str_replace('_', ' ', get_class($this)));
        $this->path_views        = "";
        $this->params            = [];
        $this->columns     =  array(
            "id"         => ['name' => '#',                            'class' => 'text-center'],
            "type"       => ['name' => lang('Payment_method'),         'class' => 'text-center'],
            "amount"     => ['name' => 'Amount Paid',                  'class' => 'text-center'],
            "txn_fee"    => ['name' => lang("Transaction_fee"),        'class' => 'text-center'],
            "status"     => ['name' => 'Status',                       'class' => 'text-center'],
            "created"    => ['name' => lang("Created"),                'class' => 'text-center'],
        );
    }
    
}