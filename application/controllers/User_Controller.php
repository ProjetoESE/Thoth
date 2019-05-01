<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class User_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function index()
	{
		$data = null;
		try {
			$this->logged_in();

			$this->load->model("User_Model");
			$data['projects'] = $this->User_Model->get_projects($this->session->email);

			load_templates('pages/dashboard', $data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			load_templates('pages/dashboard', $data);
		}

	}

	/**
	 *
	 */
	public function profile()
	{
		$this->logged_in();
		load_templates('pages/user/profile', null);
	}

}
