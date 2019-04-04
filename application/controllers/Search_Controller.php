<?php

class Search_Controller extends CI_Controller
{
	public function index()
	{
		$data['search'] = $this->input->get('search');
		load_templates('pages/search', $data);
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
