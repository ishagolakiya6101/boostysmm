<?php
defined('BASEPATH') or exit('No direct script access allowed');

class qr_payment extends MX_Controller
{
    public $tb_users;
    public $tb_transaction_logs;
    public $tb_payments;
    public $tb_payments_bonuses;
    public $payment_type;
    public $payment_id;
    public $currency_code;
    public $payment_lib;

    public function __construct($payment = "")
    {
        parent::__construct();
        $this->load->model('add_funds_model', 'model');

        $this->tb_users = USERS;
        $this->payment_type = 'qr_payment';
        $this->tb_transaction_logs = TRANSACTION_LOGS;
        $this->tb_payments = PAYMENTS_METHOD;
        $this->tb_payments_bonuses = PAYMENTS_BONUSES;
        $this->currency_code = get_option("currency_code", "USD");
        if ($this->currency_code == "") {
            $this->currency_code = 'USD';
        }

        if (!$payment) {
            $payment = $this->model->get('id, type, name, params', $this->tb_payments, ['type' => $this->payment_type]);
        }
        if ($payment) {
            $this->payment_id = $payment->id;
        }
    }

    public function index()
    {
        if ($this->input->post()) {
            $amount = (double)$this->input->post('amount');
            if ($amount <= 0) {
                $this->session->set_flashdata('error', 'Invalid request');
                redirect(base_url('add_funds'));
            }
            // Validate amount
            $min_amount = 10; // example
            $max_amount = 1000; // example
            if ($amount < $min_amount || $amount > $max_amount) {
                $this->session->set_flashdata('error', 'Amount out of range');
                redirect(base_url('add_funds'));
            }
            // Handle file upload
            $upload_path = FCPATH . 'assets/uploads/screenshots/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true);
            }
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'qr_' . time() . '_' . session('uid');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('screenshot')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url('add_funds'));
            } else {
                $file_data = $this->upload->data();
                $file_path = $file_data['file_name'];
            }
            // Insert into transaction_logs
            $data_tnx = [
                "ids"            => ids(),
                "uid"            => session('uid'),
                "type"           => $this->payment_type,
                "transaction_id" => $file_path,
                "amount"         => $amount,
                "txn_fee"        => 0,
                "note"           => 0,
                "status"         => 0, // pending for verification
                "created"        => NOW,
            ];
            $this->db->insert($this->tb_transaction_logs, $data_tnx);
            $this->session->set_flashdata('success', 'Payment submitted for verification');
            redirect(base_url('add_funds'));
        } else {
            redirect(base_url('add_funds'));
        }
    }

        public function create_payment($data_payment)
    {
        $amount = $data_payment['amount'];
        $payment_id = $this->payment_id;

        $data_insert = [
            'user_id'       => get_user_id(),
            'amount'        => $amount,
            'payment_method'=> $this->payment_type,
            'payment_id'    => $payment_id,
            'status'        => 'pending',
            'created_at'    => NOW,
        ];

        $this->model->insert($this->tb_transaction_logs, $data_insert);
        return true;
    }
}
