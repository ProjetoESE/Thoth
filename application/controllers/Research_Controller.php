<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research_Controller extends CI_Controller
{
	public function index()
	{
	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	public function add_research_question()
	{
		try {
			$id_rq = $this->input->post('id_rq');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_research_question($id_rq, $description, $id_project);

			$activity = "Added the research question " . $id_rq;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_research_question()
	{
		try {
			$id_rq = $this->input->post('id_rq');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_research_question($id_rq, $id_project);

			$activity = "Deleted the research question " . $id_rq;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_research_question()
	{
		try {
			$now_id = $this->input->post('now_id');
			$now_question = $this->input->post('now_question');
			$old_id = $this->input->post('old_id');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_research_question($now_id, $now_question, $old_id, $id_project);

			$activity = $this->session->name . "Edited the research_question " . $now_id;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}
}
