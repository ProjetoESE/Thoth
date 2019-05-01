<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Search_Controller extends Pattern_Controller
{
	/**
	 *
	 */
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

}
