<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pattern_Controller extends CI_Controller
{
	/**
	 * Pattern_Controller constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *
	 */
	public function index()
	{

	}

	/**
	 * @param $activity
	 * @param $module
	 * @param $id_project
	 */
	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	/**
	 *
	 */
	public function logged_in()
	{
		if (!$this->session->logged_in) {
			redirect(base_url());
		}
	}

	/**
	 * @param $view
	 * @param $data
	 */
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
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}

	/**
	 * @param $id_project
	 * @param $levels
	 */
	public function validate_level($id_project, $levels)
	{
		$this->logged_in();
		$this->load->model("Project_Model");
		$this->session->set_userdata('level', $this->Project_Model->get_level($this->session->email, $id_project));
		$res_level = $this->session->level;

		foreach ($levels as $l) {
			if ($l == $res_level) {
				return $res_level;
			}
		}


		redirect(base_url());

	}

}
