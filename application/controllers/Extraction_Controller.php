<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extraction_Controller extends CI_Controller
{
	public function index()
	{
	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	public function add_question_extraction()
	{
		try {
			$id = $this->input->post('id');
			$desc = $this->input->post('desc');
			$type = $this->input->post('type');
			$id_project = $this->input->post('id_project');
			$this->load->model("Extraction_Model");

			$this->Extraction_Model->add_question_extraction($id, $desc, $type, $id_project);

			$activity = "Added question extraction " . $id;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

}
