<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model
{

	public function check_email_unique($email)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->count_all_results();

		if ($query > 0) {
			return false;
		}

		return true;
	}

	public function new_user($email, $password, $name)
	{
		$now = new DateTime();
		$now->getTimestamp();

		$data = array(
			'email' => $email,
			'name' => $name,
			'password' => $password,
			'created_at' => $now->format('Y-m-d H:i:s')
		);

		$this->db->insert('user', $data);

		$user = new User();
		$user->set_name($name);
		$user->set_email($email);

		return $user;
	}

	public function check_login($email, $password)
	{
		$user = new User();
		$password = md5($password);

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('email =' => $email, 'password' => $password));
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$user->set_name($row->name);
			$user->set_email($row->email);
			return $user;
		}

		return null;
	}

}
