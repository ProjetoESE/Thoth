<?php

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
		$data['project'] = $id;
		load_templates('pages/project/project_edit', $data);
	}

	public function add_research($id)
	{
		$data['project'] = $id;
		load_templates('pages/project/project_add_research', $data);
	}

	public function planning($id)
	{
		try {
			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project($id);
			$data['languages'] = $this->Project_Model->get_languages();
			$data['study_types'] = $this->Project_Model->get_study_types();

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
		if (!isset($_SESSION['logged_in'])) {
			$data['project'] = $id;
			load_templates('pages/visitor/project_conducting_visitor', $data);
		} else {
			$data['project'] = $id;
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

	public function created_project()
	{
		try {
			if (!$this->session->logged_in) {
				redirect(base_url());
			}

			$this->load->model("Project_Model");
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$objectives = $this->input->post('$objectives');

			$data['project'] = $this->Project_Model->created_project($title, $description, $objectives, $this->session->email);

			load_templates('pages/project/project', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_domain()
	{
		try {
			$domain = $this->input->post('domain');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_domain($domain, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_domain()
	{
		try {
			$domain = $this->input->post('domain');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_domain($domain, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_language()
	{
		try {
			$language = $this->input->post('language');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_language($language, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_language()
	{
		try {
			$language = $this->input->post('language');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_language($language, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_study_type()
	{
		try {
			;;
			$study_type = $this->input->post('study_type');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_study_type($study_type, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_study_type()
	{
		try {
			$study_type = $this->input->post('study_type');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_study_type($study_type, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_keywords()
	{
		try {
			$keywords = $this->input->post('keywords');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_keywords($keywords, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_keywords()
	{
		try {
			$keywords = $this->input->post('keywords');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_keywords($keywords, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_date()
	{
		try {
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_date($start_date, $end_date, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}
}
