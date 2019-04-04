<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help_Controller extends CI_Controller
{
	public function index()
	{
		load_templates('pages/help', null);
	}

	private function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	private function logged_in()
	{
		if (!$this->session->logged_in) {
			redirect(base_url());
		}
	}
}
