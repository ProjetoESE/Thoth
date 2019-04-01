<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_Controller extends CI_Controller
{

	public function index()
	{
	}

	public function open($id)
	{
		try {
			$this->load->model("Project_Model");

			$data['project'] = $this->Project_Model->get_project($id);
			$data['logs'] = $this->Project_Model->get_logs_project($id);

			if (!isset($_SESSION['logged_in'])) {
				load_templates('pages/visitor/project_visitor', $data);
			} else {
				load_templates('pages/project/project', $data);
			}
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit($id)
	{
		$this->load->model("Project_Model");
		$data['project'] = $this->Project_Model->get_project($id);
		load_templates('pages/project/project_edit', $data);
	}

	public function add_research($id)
	{
		$this->load->model("Project_Model");
		$data['project'] = $this->Project_Model->get_project($id);
		$data['users'] = $this->Project_Model->get_users();
		$data['levels'] = $this->Project_Model->get_levels();
		load_templates('pages/project/project_add_research', $data);
	}

	public function planning($id)
	{
		try {
			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project($id);
			$data['languages'] = $this->Project_Model->get_languages();
			$data['study_types'] = $this->Project_Model->get_study_types();
			$data['databases'] = $this->Project_Model->get_databases();
			$data['rules'] = $this->Project_Model->get_rules();
			$data['question_types'] = $this->Project_Model->get_types();

			if (!isset($_SESSION['logged_in'])) {
				load_templates('pages/visitor/project_planning_visitor', $data);
			} else {
				load_templates('pages/project/project_planning', $data);
			}
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function conducting($id)
	{
		$this->load->model("Project_Model");
		$data['project'] = $this->Project_Model->get_project($id);

		if (!isset($_SESSION['logged_in'])) {
			load_templates('pages/visitor/project_conducting_visitor', $data);
		} else {
			load_templates('pages/project/project_conducting', $data);
		}
	}

	public function reporting($id)
	{
		if (!isset($_SESSION['logged_in'])) {
			$data['project'] = $id;
			load_templates('pages/visitor/project_reporting_visitor', $data);
		} else {
			$data['project'] = $id;
			load_templates('pages/project/project_reporting', $data);
		}
	}

	public function study_selection($id)
	{
		if (!isset($_SESSION['logged_in'])) {
			$data['project'] = $id;
			load_templates('pages/visitor/project_study_selection_visitor', $data);
		} else {
			$data['project'] = $id;
			load_templates('pages/project/project_study_selection', $data);
		}
	}

	public function quality_assessement($id)
	{
		if (!isset($_SESSION['logged_in'])) {
			$data['project'] = $id;
			load_templates('pages/visitor/project_quality_assessement_visitor', $data);
		} else {
			$data['project'] = $id;
			load_templates('pages/project/project_quality_assessement', $data);
		}
	}

	public function data_extraction($id)
	{
		if (!isset($_SESSION['logged_in'])) {
			$data['project'] = $id;
			load_templates('pages/visitor/project_data_extraction_visitor', $data);
		} else {
			$data['project'] = $id;
			load_templates('pages/project/project_data_extraction', $data);
		}
	}

	public function new_project()
	{
		try {
			if (!$this->session->logged_in) {
				redirect(base_url());
			}

			load_templates('pages/project/project_new', null);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			load_templates('pages/project/project_new', null);
		}
	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	public function created_project()
	{
		try {
			if (!$this->session->logged_in) {
				redirect(base_url());
			}

			$this->load->model("Project_Model");
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$objectives = $this->input->post('objectives');

			$id_project = $this->Project_Model->created_project($title, $description, $objectives, $this->session->email);

			$activity = "Created the project " . $title;
			$this->insert_log($activity, 1, $id_project);

			redirect('open/' . $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_member()
	{
		try {
			$email = $this->input->post('email');
			$id_project = $this->input->post('id_project');
			$level = $this->input->post('level');
			$this->load->model("Project_Model");

			$this->Project_Model->add_member($email, $level, $id_project);

			$activity = "Added member " . $email;
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edited_project()
	{
		try {
			$title = $this->input->post('title');
			$id_project = $this->input->post('id_project');
			$description = $this->input->post('description');
			$objectives = $this->input->post('objectives');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_project($title, $description, $objectives, $id_project);

			$activity = "Edited project";
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

}
