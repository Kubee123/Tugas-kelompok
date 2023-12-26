<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RegisterModel');
        $this->load->model('UserModel');
        $this->load->model('PaymentModel');
    }
    public function index()
    {
        $this->load->view('layouts/user/header');
        $this->load->view('layouts/user/hero');

        $this->load->view('home/index');
        $this->load->view('layouts/user/footer');
    }
    public function register()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->RegisterModel->rules());
        if (empty($_FILES['foto_diri']['name'])) {
            $this->form_validation->set_rules('foto_diri', 'Document', 'required');
        }
        if (empty($_FILES['ijasah']['name'])) {
            $this->form_validation->set_rules('ijasah', 'Document', 'required');
        }
        if (empty($_FILES['skhun']['name'])) {
            $this->form_validation->set_rules('skhun', 'Document', 'required');
        }
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layouts/user/header');
            $this->load->view('layouts/user/hero');
            $this->load->view('home/register/index');
            $this->load->view('layouts/user/footer');
        } else {
            $data = [];
            if ($this->do_upload('ijasah')) {
                $data['ijasah'] = $this->upload->data();
            } else {
                var_dump(1);
                exit;
            }
            if ($this->do_upload('foto_diri')) {
                $data['foto_diri'] = $this->upload->data();
            } else {
                var_dump(1);
                exit;
            }
            if ($this->do_upload('skhun')) {
                $data['skhun'] = $this->upload->data();
            } else {
                var_dump(1);
                exit;
            }
            $dat = [];
            $dat = $this->input->post();
            $dat['ijasah'] = $data['ijasah']['file_name'];
            $dat['foto_diri'] = $data['foto_diri']['file_name'];
            $dat['skhun'] = $data['skhun']['file_name'];
            $dat['created_at'] = date("Y-m-d H:i:s");
            $dat['updated_at'] = date("Y-m-d H:i:s");
            $dat['code'] = $this->random(30);

            if ($this->RegisterModel->RegisterSiswa($dat)) {
                $body = '
                Dear, <b>' . $this->input->post('name') . '</b>
                Telah berhasil mendaftar sebagia mahasiswa baru di dokona school
                <br>
    
                <p> link untuk melakukan pembayaran ' . base_url('payment/' . $dat['code']) . ' </p>
                ';
                mailer($this->input->post('email'), $this->input->post('name'), $body);
                return redirect('/');
            }
        }
    }
    public function do_upload($inputName)
    {
        $file_name = $this->random(10);
        $config['upload_path']          = FCPATH . '/uploads/data/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $file_name;
        $config['max_size']             = 2000000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($inputName)) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            var_dump($error);
            exit;
            return false;
        } else {
            return true;
        }
    }
    public function payment($id)
    {
        $siswa = $this->UserModel->getForm(['code' => $id], 'formulir');
        if (!$siswa) {
            return redirect('/');
        }
        if ($this->PaymentModel->checkPayment(['formulir_id' => $siswa->formulir_id])) {
            return redirect('/payment/' . $id . '/confirm');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'siswa' => $siswa
            ];
            $this->load->view('home/payment/index', $data);
        } else {
            $bank = $this->input->post('bank');
            $bank = explode('|', $bank);
            $data =  [
                'metode_pembayaran' => $bank[0],
                'total_pembayaran' =>  2220000,
                'formulir_id' => $siswa->formulir_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'status' => 0,
                'va_number' => $bank[1]

            ];
            $this->PaymentModel->insertPayment($data);
            return redirect('payment/' . $siswa->code . '/confirm');
        }
    }
    public function confirm($id)
    {
        $siswa = $this->UserModel->getForm(['code' => $id], 'formulir');
        if (!$siswa) {
            return redirect('/');
        }
        $payment = $this->PaymentModel->checkPayment(['formulir_id' => $siswa->formulir_id]);
        if (!$payment) {

            return redirect('/');
        }

        if ($payment->status > 0) {
            return redirect('payment/' . $siswa->code . '/end');
        }
        $this->load->library('form_validation');
        if (empty($_FILES['bukti_transfer'])) {
            $this->form_validation->set_rules('bukti_transfer', 'Bukti Transfer', 'required');
        }
        $this->form_validation->set_rules('csrf', 'CSRF', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'payment' => $payment,
            ];
            $this->load->view('home/payment/confirm/index', $data);
            return true;
        } else {

            if ($this->do_upload('bukti_transfer')) {
                $dat = $this->upload->data();

                $data['bukti'] = $dat['file_name'];
                $data['status'] = 1;
                $data['tanggal_pembayaran'] = date("Y-m-d H:i:s");
            } else {
                var_dump(1);
                exit;
            }

            $this->PaymentModel->editPayment(['pembayaran_id' => $payment->pembayaran_id], $data);
            return redirect('payment/' . $siswa->code . '/end');
        }
    }
    public function end($id)
    {
        $siswa = $this->UserModel->getForm(['code' => $id], 'formulir');
        if (!$siswa) {
            return redirect('/');
        }
        $payment = $this->PaymentModel->checkPayment(['formulir_id' => $siswa->formulir_id]);
        if (!$payment) {

            return redirect('/');
        }



        $data = [
            'payment' => $payment,
        ];
        $this->load->view('home/status/index', $data);
        // echo $id;
    }
    public function random($length = 8)
    {
        // Load the helper in your controller or model
        $this->load->helper('string');

        // Generate a random string of 8 characters
        $random_text = random_string('alnum', $length);
        return $random_text;
    }
}
