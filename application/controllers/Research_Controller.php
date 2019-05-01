<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Research_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function add_research_question()
	{
		$id_project = null;
		try {
			$id_rq = $this->input->post('id_rq');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Research_Model");
			$this->Research_Model->add_research_question($id_rq, $description, $id_project);

			$activity = "Added the research question " . $id_rq;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			if (is_null($id_project) || empty($id_project)) {
				redirect(base_url());
			} else {
				redirect(base_url('planning/' . $id_project));
			}
		}
	}

	/**
	 *
	 */
	public function delete_research_question()
	{
		$id_project = null;
		try {
			$id_rq = $this->input->post('id_rq');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Research_Model");
			$this->Research_Model->delete_research_question($id_rq, $id_project);

			$activity = "Deleted the research question " . $id_rq;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			if (is_null($id_project) || empty($id_project)) {
				redirect(base_url());
			} else {
				redirect(base_url('planning/' . $id_project));
			}
		}
	}

	/**
	 *
	 */
	public function edit_research_question()
	{
		$id_project = null;
		try {
			$now_id = $this->input->post('now_id');
			$now_question = $this->input->post('now_question');
			$old_id = $this->input->post('old_id');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Research_Model");
			$this->Research_Model->edit_research_question($now_id, $now_question, $old_id, $id_project);

			$activity = $this->session->name . "Edited the research_question " . $now_id;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			if (is_null($id_project) || empty($id_project)) {
				redirect(base_url());
			} else {
				redirect(base_url('planning/' . $id_project));
			}
		}
	}

}
