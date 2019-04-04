<?php

class Search_Controller extends CI_Controller
{
	public function index()
	{
		$data['search'] = $this->input->get('search');
		$this->load->model("User_Model");
		if (!$this->session->logged_in) {
			$data['projects'] = $this->User_Model->search_project($data['search']);
		} else {
			$data['projects'] = $this->User_Model->search_project_logged($data['search'], $this->session->email);
		}
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

	private function validate_level($project_id, $levels)
	{
		$this->load->model("Project_Model");
		$res_level = $this->Project_Model->get_level($this->session->email, $project_id);

		foreach ($levels as $l) {
			if ($l == $res_level) {
				return;
			}
		}

		redirect(base_url());

	}
}
