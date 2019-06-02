<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Login_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function index()
	{

	}

	/**
	 *
	 */
	public function log_into()
	{
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', trim(validation_errors()));
			redirect(base_url("login"));
		}
		try {
			$this->load->model("Login_Model");
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->Login_Model->check_login($email, $password);

			if (is_null($user)) {
				$this->session->set_flashdata('error', 'Email or Password invalid!');
				redirect(base_url("login"));
			}

			$session = array(
				'name' => $user->get_name(),
				'email' => $user->get_email(),
				'logged_in' => true,
				'level' => null
			);

			$this->session->set_userdata($session);

			$activity = "Logged in";
			$this->insert_log($activity, 2, null);

			redirect(base_url("dashboard"));
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url("login"));
		}
	}

	/**
	 *
	 */
	public function log_up()
	{
		try {
			$this->load->model("Login_Model");
			$email = $this->input->post('email');


			if (!$this->Login_Model->check_email_unique($email)) {
				$this->session->set_flashdata('error', 'Email already used!');
				redirect(base_url("sign_up"));
			}

			$password = md5($this->input->post('password'));
			$name = $this->input->post('name');

			$user = $this->Login_Model->new_user($email, $password, $name);

			$session = array(
				'name' => $user->get_name(),
				'email' => $user->get_email(),
				'logged_in' => true,
				'level' => null
			);

			$this->session->set_userdata($session);

			$activity = "Created new user and logged in";
			$this->insert_log($activity, 2, null);

			redirect(base_url("dashboard"));
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url("sign_up"));
		}
	}

	/**
	 *
	 */
	public function sign_in()
	{
		try {
			if ($this->session->logged_in) {
				redirect(base_url("dashboard"));
			}
			load_templates('pages/login/sign_in', null);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function sign_out()
	{
		try {
			$activity = "Logged out";
			$this->insert_log($activity, 2, null);

			$this->session->sess_destroy();
			redirect(base_url());
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function sign_up()
	{
		try {
			if ($this->session->logged_in) {
				redirect(base_url("dashboard"));
			}
			load_templates('pages/login/sign_up', null);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

}
