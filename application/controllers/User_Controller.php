<?php

class User_Controller extends CI_Controller
{
	public function index()
	{
		$data = null;
		try {
			if (!$this->session->logged_in) {
				redirect(base_url());
			}
			$this->load->model("User_Model");

			$data['projects'] = $this->User_Model->get_projects($this->session->email);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			load_templates('pages/dashboard', $data);
		}
		load_templates('pages/dashboard', $data);

	}

	public function profile()
	{
		$this->logged_in();
		load_templates('pages/user/profile', null);
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
