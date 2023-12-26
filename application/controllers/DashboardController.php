<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('UserModel');

		$this->load->helper(array('form', 'url'));
		
		if (!$this->AuthModel->current_user()) {
			redirect('auth');
		}
	}
	public function index()
	{
		$all = [];
		$terima = [
			'status_formulir' => 1
		];
		$pending = [
			'status_formulir' => 0,
		];
		$tolak = [

			'status_formulir' => 2,
		];
		$uall = $this->UserModel->sumByStatus($all);
		$ut = $this->UserModel->sumByStatus($terima);
		$tolak = $this->UserModel->sumByStatus($tolak);
		$pending = $this->UserModel->sumByStatus($pending);
		$data = [
			'user' => $this->AuthModel->current_user(),
			'all' => $uall,
			'terima' => $ut,
			'tolak' => $tolak,
			'pending' => $pending,
		];
		
		$this->load->view('layouts/home/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('layouts/home/footer', $data);
	}
	public function do_upload()
	{
		
		$file_name = $this->random(10);
		$config['upload_path']          = FCPATH . '/uploads/bukti_transfer/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = $file_name;
		$config['max_size']             = 2000000;
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('images')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			
			var_dump($error);
			exit;
			// redirect(base_url('file'));
		} else {
			$upload_data = $this->upload->data();
			$where = [
				'id' => $this->session->userdata('user_id'),
			];
			$data = [ 
				'bukti_transfer' => $file_name . $upload_data['file_ext'],
				'transfer_date' => date("Y-m-d H:i:s"),
				
			];
			$this->UserModel->editUser($where,$data,'users');
			redirect('/');
		}
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
