<?php

class PaymentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insertPayment($data)
    {
        $this->db->insert('pembayaran', $data);
    }
    public function checkPayment($where)
    {
        $this->db->where($where);
        $query = $this->db->get('pembayaran');
        return $query->row();
    }
    public function editPayment($where, $data)
    {
        $data['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where($where);
        $this->db->update('pembayaran', $data);
    }
}
