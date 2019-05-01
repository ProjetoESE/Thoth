<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Criteria_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function edit_exclusion_rule()
	{
		$id_project = null;
		try {
			$rule = $this->input->post('rule');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Criteria_Model");
			$this->Criteria_Model->edit_exclusion_rule($rule, $id_project);

			$activity = "Edited exclusion rule";
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
	public function edit_inclusion_rule()
	{
		$id_project = null;
		try {
			$rule = $this->input->post('rule');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Criteria_Model");
			$this->Criteria_Model->edit_inclusion_rule($rule, $id_project);

			$activity = "Edited inclusion rule";
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
	public function add_criteria()
	{
		$id_project = null;
		try {
			$id = $this->input->post('id');
			$type = $this->input->post('type');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Criteria_Model");
			$this->Criteria_Model->add_criteria($id, $description, false, $id_project, $type);

			$activity = "Added inclusion criteria " . $id;
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
	public function selected_pre_select()
	{
		$id_project = null;
		try {

			$id = $this->input->post('id');
			$pre_selected = $this->input->post('pre_selected');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Criteria_Model");
			$this->Criteria_Model->selected_pre_select($id, $pre_selected, $id_project);

			if ($pre_selected) {
				$activity = "Selected criteria " . $id;
				$this->insert_log($activity, 1, $id_project);
			} else {
				$activity = $this->session->name . " deselected criteria " . $id;
				$this->insert_log($activity, 1, $id_project);
			}

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
	public function delete_criteria()
	{
		$id_project = null;
		try {
			$id = $this->input->post('id');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Criteria_Model");
			$this->Criteria_Model->delete_criteria($id, $id_project);

			$activity = "Deleted criteria " . $id;
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
	public function edit_criteria()
	{
		$id_project = null;
		try {

			$old_id = $this->input->post('old_id');
			$new_id = $this->input->post('new_id');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');
			$new_type = $this->input->post('new_type');
			$pre_selected = $this->input->post('pre_selected');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Criteria_Model");
			$this->Criteria_Model->update_criteria($old_id, $new_id, $description, $pre_selected, $id_project, $new_type);

			$activity = "Updated criteria " . $new_id;
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
