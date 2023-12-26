<?php
class AuthModel extends CI_Model
{
	private $_table = "users";
	const SESSION_KEY = 'user_id';

	public function rules()
	{
		return [
			[
				'field' => 'email',
				'label' => 'Email|email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}
	public function login($username, $password)
	{
		$this->db->where('email', $username);
		$query = $this->db->get($this->_table);
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}


		// cek apakah passwordnya benar?
		// if (!password_verify($password, $user->password)) {
		//     return FALSE;
		// }

		if (!password_verify($password, $user->password)) {
			return FALSE;
		}

		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $user->id]);
		$this->_update_last_login($user->id);
		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}
		$user_id = $this->session->userdata(self::SESSION_KEY);
		// $query = $this->db->get_where($this->_table, ['id' => $user_id])->join('detail_user','users.id','=','detail_user.user_id');
		// return $query->row();
		// Build the query using the active record methods
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('users.id', $user_id);
		$this->db->join('user_detail', 'users.id = user_detail.user_id','LEFT');

		// Execute the query
		$query = $this->db->get();
		// Return the result
		// var_dump($query->row());
		// exit;
		return $query->row();
	}
	public function is_admin(){
		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->where([
			'id' => $user_id,
			'is_admin' => 1
		])->from($this->_table)->get();
	
		return $query->num_rows() == 0 ? false : true;
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	private function _update_last_login($id)
	{
		$data = [
			'updated_at' => date("Y-m-d H:i:s"),
		];

		return $this->db->update($this->_table, $data, ['id' => $id]);
	}
}
