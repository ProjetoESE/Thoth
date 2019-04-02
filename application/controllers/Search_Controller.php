<?php

class Search_Controller extends CI_Controller
{
	public function index()
	{
		$data['search'] = $this->input->get('search');
		load_templates('pages/search', $data);
	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}
}
