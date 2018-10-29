<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
	}


	public function dashboard()
	{
		if (!$this->session->logged_in) {
			redirect(base_url());
		}
		load_templates('pages/dashboard');
	}

	public function log_into()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');


		if ($email != "guilhermebolfe11@gmail.com") {
			$this->session->set_flashdata('error', 'Email or Password invalid!');
			redirect(base_url("login/sign_in"));
		}

		$session = array(
			'name' => "Guilherme Bolfe",
			'logged_in' => true
		);

		$this->session->set_userdata($session);
		redirect(base_url("login/dashboard"));
	}

	public function log_up()
	{
		$session = array(
			'name' => 'Outro',
			'logged_in' => true
		);

		$this->session->set_userdata($session);
		load_templates('pages/dashboard');
	}

	public function sign_in()
	{
		if($this->session->logged_in){
			redirect(base_url('login/dashboard'));
		}
		load_templates('pages/sign_in');
	}

	public function sign_out()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function sign_up()
	{
		if($this->session->logged_in){
			redirect(base_url('login/dashboard'));
		}
		load_templates('pages/sign_up');
	}

}
