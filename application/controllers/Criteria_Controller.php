<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria_Controller extends CI_Controller
{
	public function index()
	{
	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	public function edit_exclusion_rule()
	{
		try {
			$rule = $this->input->post('rule');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_exclusion_rule($rule, $id_project);

			$activity = "Edited exclusion rule " . $id_project;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_inclusion_rule()
	{
		try {
			$rule = $this->input->post('rule');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_inclusion_rule($rule, $id_project);

			$activity = "Edited inclusion rule " . $id_project;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_criteria()
	{
		try {
			$id = $this->input->post('id');
			$type = $this->input->post('type');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_criteria($id, $description, false, $id_project, $type);
			$activity = "Added inclusion criteria " . $id;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function selected_pre_select()
	{
		try {
			$id = $this->input->post('id');
			$pre_selected = $this->input->post('pre_selected');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->selected_pre_select($id, $pre_selected, $id_project);

			if ($pre_selected) {
				$activity = "Selected criteria " . $id;
				$this->insert_log($activity, 1, $id_project);
			} else {
				$activity = $this->session->name . " deselected criteria " . $id;
				$this->insert_log($activity, 1);
			}

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_criteria()
	{
		try {
			$id = $this->input->post('id');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_criteria($id, $id_project);

			$activity = "Deleted criteria " . $id;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_criteria()
	{
		try {
			$old_id = $this->input->post('old_id');
			$id_project = $this->input->post('id_project');
			$new_id = $this->input->post('new_id');
			$description = $this->input->post('description');
			$new_type = $this->input->post('new_type');
			$pre_selected = $this->input->post('pre_selected');

			$this->load->model("Project_Model");

			$this->Project_Model->update_criteria($old_id, $new_id, $description, $pre_selected, $id_project, $new_type);

			$activity = "Updated criteria " . $new_id;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}
}
