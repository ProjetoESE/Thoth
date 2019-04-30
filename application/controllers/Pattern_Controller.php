<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pattern_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	public function logged_in()
	{
		if (!$this->session->logged_in) {
			redirect(base_url());
		}
	}

	public function load_views($view, $data)
	{
		$level = $this->session->level;
		if ($this->session->logged_in) {
			if (!is_null($level)) {
				switch ($level) {
					case 1:
					case 3:
					case 4:
						load_templates($view, $data);
						break;
					case 2:
						load_templates($view . '_visitor', $data);
						break;
				}
			} else {
				load_templates($view . '_visitor', $data);
			}
		} else {
			load_templates($view . '_visitor', $data);
		}
	}

	public function validate_level($id_project, $levels)
	{
		$this->logged_in();
		$this->load->model("Project_Model");
		$this->session->set_userdata('level', $this->Project_Model->get_level($this->session->email, $id_project));
		$res_level = $this->session->level;

		foreach ($levels as $l) {
			if ($l == $res_level) {
				return;
			}
		}


		redirect(base_url());

	}

}