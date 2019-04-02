<?php

class About_Controller extends CI_Controller
{

	public function index()
	{
		load_templates('pages/about', null);
	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}
}
