<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller
{

	public function index()
	{
		load_templates('home', null);
	}

	private function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	private function validate_level($levels)
	{
		$res_level = $this->session->level;

		foreach ($levels as $l) {
			if ($l == $res_level) {
				return;
			}
		}

		redirect(base_url());

	}
}
