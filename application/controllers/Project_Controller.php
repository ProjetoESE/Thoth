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
			$data['databases'] = $this->Project_Model->get_databases();
			$data['rules'] = $this->Project_Model->get_rules();

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

	public function insert_log($activity, $module)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module);
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

			$data['project'] = $this->Project_Model->created_project($title, $description, $objectives, $this->session->email);

			$activity = $this->session->name . " created the project " . $title;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " added the domain " . $domain;
			$this->insert_log($activity, 1);
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

			$activity = $this->session->name . " deleted the domain " . $domain;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_domain()
	{
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_domain($now, $old, $id_project);

			$activity = $this->session->name . " edited the domain " . $old . " for " . $now;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " added the language " . $language;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " deleted the language " . $language;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_study_type()
	{
		try {
			$study_type = $this->input->post('study_type');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_study_type($study_type, $id_project);

			$activity = $this->session->name . " added the study type " . $study_type;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " deleted the study type " . $study_type;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " added the keywords " . $keywords;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " deleted the keyword " . $keywords;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_keywords()
	{
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_keywords($now, $old, $id_project);

			$activity = $this->session->name . " edited the keywords " . $old . " for " . $now;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " added the start date " . $start_date . " and end date " . $end_date;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_database()
	{
		try {
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_database($database, $id_project);

			$activity = $this->session->name . " added the database " . $database;
			$this->insert_log($activity, 1);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_database()
	{
		try {
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_database($database, $id_project);

			$activity = $this->session->name . " deleted the database " . $database;
			$this->insert_log($activity, 1);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_research_question()
	{
		try {
			$id_rq = $this->input->post('id_rq');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_research_question($id_rq, $description, $id_project);

			$activity = $this->session->name . " added the research question " . $id_rq;
			$this->insert_log($activity, 1);


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

			$activity = $this->session->name . " deleted the research question " . $id_rq;
			$this->insert_log($activity, 1);


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

			$activity = $this->session->name . " edited the research_question " . $now_id;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_term()
	{
		try {
			$term = $this->input->post('term');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_term($term, $id_project);

			$activity = $this->session->name . " added the term" . $term;
			$this->insert_log($activity, 1);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_term()
	{
		try {
			$term = $this->input->post('term');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_term($term, $id_project);

			$activity = $this->session->name . " deleted the term" . $term;
			$this->insert_log($activity, 1);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_term()
	{
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_term($now, $old, $id_project);

			$activity = $this->session->name . " edited the term " . $old . " for " . $now;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function add_synonym()
	{
		try {
			$term = $this->input->post('term');
			$syn = $this->input->post('syn');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->add_synonym($syn, $term, $id_project);

			$activity = $this->session->name . " added the synonym" . $syn;
			$this->insert_log($activity, 1);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_synonym()
	{
		try {
			$term = $this->input->post('term');
			$syn = $this->input->post('syn');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->delete_synonym($syn, $term, $id_project);

			$activity = $this->session->name . " deleted the synonym" . $syn;
			$this->insert_log($activity, 1);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_synonym()
	{
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$term = $this->input->post('term');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_synonym($now, $old, $term, $id_project);

			$activity = $this->session->name . " edited the synonym " . $old . " for " . $now;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function generate_string()
	{
		try {
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");
			$string = null;

			$data = $this->Project_Model->get_terms_and_syn($id_project);

			switch ($database) {
				case "SCOPUS":
					$string = 'TITLE-ABS-KEY ';
					break;
				case "IEEE":
					$string = '';
					break;
				case "SCIENCE DIRECT":
					$string = '';
					break;
				case "ENGINEERING VILLAGE":
					$string = '(';
					break;
				case "ACM":
					$string = '';
					break;
				case "SPRINGER LINK":
					$string = '';
					break;
				default:
					break;
			}

			$count = 0;
			foreach ($data as $term) {
				if ($count > 0) {
					$string .= " AND ";
				}
				if ($database == "ENGINEERING VILLAGE") {
					$string .= '(';
				}
				$string .= "(";

				if (preg_match('/\s/', $term->get_description())) {
					$string .= '"' . $term->get_description() . '"';
				} else {
					$string .= $term->get_description();
				}

				foreach ($term->get_synonyms() as $synonym) {

					if ($database == "ACM") {
						$string .= " ";
					} else {
						$string .= " OR ";
					}
					if (preg_match('/\s/', $synonym)) {
						$string .= '"' . $synonym . '"';
					} else {
						$string .= $synonym;
					}
				}
				$string .= ")";
				if ($database == "ENGINEERING VILLAGE") {
					$string .= ' WN KY)';
				}
				$count++;
			}
			if ($database == "ENGINEERING VILLAGE") {
				$string .= ' AND ({english} WN LA)';
			}

			if ($database != "Generic") {

				$id_project_database = $this->Project_Model->get_id_project_database($database, $id_project);
				$this->Project_Model->generate_string($string, $id_project_database);

			} else {
				$this->Project_Model->generate_string_generic($string, $id_project);
			}


			$activity = $this->session->name . " generated search string " . $string;
			$this->insert_log($activity, 1);

			echo $string;

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_search_strategy()
	{
		try {
			$search_strategy = $this->input->post('search_strategy');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_search_strategy($search_strategy, $id_project);

			$activity = $this->session->name . " edited search strategy " . $id_project;
			$this->insert_log($activity, 1);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function edit_exclusion_rule()
	{
		try {
			$rule = $this->input->post('rule');
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->edit_exclusion_rule($rule, $id_project);

			$activity = $this->session->name . " edited exclusion rule " . $id_project;
			$this->insert_log($activity, 1);

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

			$activity = $this->session->name . " edited inclusion rule " . $id_project;
			$this->insert_log($activity, 1);

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

			if ($type == "Inclusion") {
				$this->Project_Model->add_inclusion_criteria($id, $description, $id_project);
				$activity = $this->session->name . " added inclusion criteria " . $id_project;
				$this->insert_log($activity, 1);
			} else if ($type == "Exclusion") {
				$this->Project_Model->add_exclusion_criteria($id, $description, $id_project);
				$activity = $this->session->name . " added exclusion criteria " . $id_project;
				$this->insert_log($activity, 1);
			}

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
			//$this->load->model("Project_Model");

			var_dump($id);
			var_dump($pre_selected);
			var_dump($id_project);
			/*if ($type == "Inclusion") {
				$this->Project_Model->add_inclusion_criteria($id, $description, $id_project);
				$activity = $this->session->name . " added inclusion criteria " . $id_project;
				$this->insert_log($activity, 1);
			} else if ($type == "Exclusion") {
				$this->Project_Model->add_exclusion_criteria($id, $description, $id_project);
				$activity = $this->session->name . " added exclusion criteria " . $id_project;
				$this->insert_log($activity, 1);
			}*/

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}
}
