<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{

	}

	public function log_into()
	{
		try {
			$this->load->model("Login_Model");
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->Login_Model->check_login($email, $password);

			if (is_null($user)) {
				$this->session->set_flashdata('error', 'Email or Password invalid!');
				redirect(base_url("login/sign_in"));
			}

			$session = array(
				'name' => $user->getName(),
				'logged_in' => true
			);

			$this->session->set_userdata($session);
			redirect(base_url("user_controller"));
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url("login/sign_in"));
		}
	}

	public function log_up()
	{
		try {
			$this->load->model("Login_Model");
			$email = $this->input->post('email');


			if (!$this->Login_Model->check_email_unique($email)) {
				$this->session->set_flashdata('error', 'Email already used!');
				redirect(base_url("login/sign_up"));
			}

			$password = md5($this->input->post('password'));
			$name = $this->input->post('name');

			$user = $this->Login_Model->new_user($email, $password, $name);

			$session = array(
				'name' => $user->getName(),
				'logged_in' => true
			);

			$this->session->set_userdata($session);
			redirect(base_url("user_controller"));
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url("login/sign_up"));
		}
	}

	public function sign_in()
	{
		if ($this->session->logged_in) {
			redirect(base_url("user_controller"));
		}
		load_templates('pages/login/sign_in', null);
	}

	public function sign_out()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function sign_up()
	{
		if ($this->session->logged_in) {
			redirect(base_url("user_controller"));
		}
		load_templates('pages/login/sign_up', null);
	}

}
