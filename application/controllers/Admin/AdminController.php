<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('UserModel');
		$this->load->model('PaymentModel');
		$this->load->model('RegisterModel');


		$this->load->helper(array('form', 'url'));
		if (!$this->AuthModel->current_user()) {

			redirect('auth');
		}
		if (!$this->AuthModel->is_admin()) {
			redirect('/');
		}
	}
	public function index()
	{


		$data = [
			'user' => $this->AuthModel->current_user(),
			'list_siswa' => $this->UserModel->getAllForm()
		];
		// var_dump($data);
		// exit;
		$this->load->view('layouts/home/header', $data);
		$this->load->view('admin/list/index', $data);
		$this->load->view('layouts/home/footer', $data);
	}
	public function approve($id)
	{
		$form = $this->UserModel->getForm(['formulir_id' => $id], 'formulir');
		$this->UserModel->editUser(['formulir_id' => $id], ['status_formulir' => 1, 'accept_by' => $this->session->userdata('user_id')], 'formulir');
		$this->UserModel->editUser(['formulir_id' => $id], ['status' => 2, 'accept_by' => $this->session->userdata('user_id')], 'pembayaran');
		// $user = $this->UserModel->getUser(['users.id' => $id]);
		$body = '
        <p>Dear,' . $form->name . '</p>
    
		<p> Anda Telah di terima masuk ke docona Shcool </p>
      
        ';
		$this->UserModel->mailer($form->email, $form->name, $body);
		redirect('admin/list/calon_siswa');
	}
	public function logout()
	{


		$this->AuthModel->logout();
		return redirect('auth');
	}
	public function decline($id)
	{
		$form = $this->UserModel->getForm(['formulir_id' => $id], 'formulir');
		$this->UserModel->editUser(['formulir_id' => $id], ['status_formulir' => 2, 'accept_by' => $this->session->userdata('user_id')], 'formulir');
		$this->UserModel->editUser(['formulir_id' => $id], ['status' => 3, 'accept_by' => $this->session->userdata('user_id')], 'pembayaran');
		$body = '
        <p>Dear,' . $form->name . '</p>
    
		<p> Anda Di tolak masuk ke docona Shcool </p>
      
        ';
		$this->UserModel->mailer($form->email, $form->name, $body);
		redirect('admin/list/calon_siswa');
	}
	public function detail($id)
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$item = [
			'first_name',
			'last_name',
			'email',
			'no_handphone_orang_tua',
			'nik',
			'no_kk',
			'nama_orang_tua',
			'jenis_kelamin',
			'alamat',
		];
		// $this->session->unset_userdata($item);
		$user = $this->AuthModel->current_user();
		$siswa = $this->UserModel->getForm(['formulir_id' => $id], 'formulir');
		$data = [
			'user' => $user,
			'siswa' => $siswa
		];

		$this->form_validation->set_rules($this->RegisterModel->rules());

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/home/header', $data);
			$this->load->view('admin/edit/index', $data);
			$this->load->view('layouts/home/footer', $data);
			return true;
		}
		$data = $this->input->post();


		$this->UserModel->editUser(['formulir_id' => $id], $data, 'formulir');

		return redirect('admin/list/calon_siswa');
	}
}
