<?php


defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('RegisterModel');
		$this->load->model('AuthModel');
		// $this->AuthModel->logout();
		// var_dump($this->session->userdata());
		// exit;
		if ($this->AuthModel->current_user()) {
			redirect('/admin/dashboard');
		}
	}


	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->model('AuthModel');
		$this->load->library('form_validation');
		$rules = $this->AuthModel->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/auth/header');
			$this->load->view('auth/login');
			$this->load->view('layouts/auth/footer');
			// return true;
		}else{

			$username = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->AuthModel->login($username, $password)) {
				
				redirect('/admin/dashboard');
			} else {
				$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan Email dan passwrod benar!');
			}
			
					$this->load->view('layouts/auth/header');
					$this->load->view('auth/login');
					$this->load->view('layouts/auth/footer');
		}

	}

	public function register()
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


		$this->form_validation->set_rules('first_name', 'FirstName', 'required');
		$this->form_validation->set_rules('last_name', 'LastName', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

		$this->form_validation->set_rules('no_handphone_orang_tua', 'NoHandphoneOrangTua', 'required|numeric');
		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('no_kk', 'NoKk', 'required|numeric');
		$this->form_validation->set_rules('nama_orang_tua', 'NamaOrangTua', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'JenisKelamin', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/auth/header');
			$this->load->view('auth/register');
			$this->load->view('layouts/auth/footer');
		} else {
			$data = [
				'name' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
				// 'first_name' => $this->input->post('first_name'),
				// 'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'no_handphone_orang_tua' => $this->input->post('no_handphone_orang_tua'),
				'nik' => $this->input->post('nik'),
				'no_kk' => $this->input->post('no_kk'),
				'nama_orang_tua' => $this->input->post('nama_orang_tua'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),

			];
			if ($this->RegisterModel->RegisterAccount($data)) {
				$this->session->set_flashdata('success', 'Register Compleate');
				return redirect('auth/register');
			}
		}
	}
}
