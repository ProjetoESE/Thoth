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
			$this->export_doc($id);
			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project($id);
			$data['logs'] = $this->Project_Model->get_logs_project($id);
			$data['progress_planning'] = $this->progress_planning($data['project']);
			$data['progress_import_studies'] = $this->progress_import_studies($data['project']);
			$data['progress_study_selection'] = $this->progress_study_selection($data['project']);
			$data['progress_quality_assessement'] = $this->progress_quality_assessement($data['project']);
			$data['progress_data_extraction'] = $this->progress_data_extraction($data['project']);


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
			$data['progress_planning'] = $this->progress_planning($data['project']);

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
		$data['progress_planning'] = $this->progress_planning($data['project']);
		$data['progress_import_studies'] = $this->progress_import_studies($data['project']);
		$data['progress_study_selection'] = $this->progress_study_selection($data['project']);
		$data['progress_quality_assessement'] = $this->progress_quality_assessement($data['project']);
		$data['progress_data_extraction'] = $this->progress_data_extraction($data['project']);

		if (!isset($_SESSION['logged_in'])) {
			load_templates('pages/visitor/project_conducting_visitor', $data);
		} else {
			load_templates('pages/project/project_conducting', $data);
		}
	}

	public function reporting($id)
	{
		$this->load->model("Project_Model");
		$data['project'] = $this->Project_Model->get_project($id);
		$data['progress_planning'] = $this->progress_planning($data['project']);
		$data['progress_import_studies'] = $this->progress_import_studies($data['project']);
		$data['progress_study_selection'] = $this->progress_study_selection($data['project']);
		$data['progress_quality_assessement'] = $this->progress_quality_assessement($data['project']);
		$data['progress_data_extraction'] = $this->progress_data_extraction($data['project']);

		if (!isset($_SESSION['logged_in'])) {
			load_templates('pages/visitor/project_reporting_visitor', $data);
		} else {
			load_templates('pages/project/project_reporting', $data);
		}
	}

	public function study_selection($id)
	{
		$this->load->model("Project_Model");
		$data['project'] = $this->Project_Model->get_project($id);
		$data['progress_study_selection'] = $this->progress_study_selection($data['project']);
		$data['progress_quality_assessement'] = $this->progress_quality_assessement($data['project']);
		$data['progress_data_extraction'] = $this->progress_data_extraction($data['project']);

		if (!isset($_SESSION['logged_in'])) {
			load_templates('pages/visitor/project_study_selection_visitor', $data);
		} else {
			load_templates('pages/project/project_study_selection', $data);
		}
	}

	public function quality_assessement($id)
	{
		$this->load->model("Project_Model");
		$data['project'] = $this->Project_Model->get_project($id);
		$data['progress_quality_assessement'] = $this->progress_quality_assessement($data['project']);
		$data['progress_data_extraction'] = $this->progress_data_extraction($data['project']);

		if (!isset($_SESSION['logged_in'])) {
			load_templates('pages/visitor/project_quality_assessement_visitor', $data);
		} else {
			load_templates('pages/project/project_quality_assessement', $data);
		}
	}

	public function data_extraction($id)
	{
		$this->load->model("Project_Model");
		$data['project'] = $this->Project_Model->get_project($id);
		$data['progress_data_extraction'] = $this->progress_data_extraction($data['project']);

		if (!isset($_SESSION['logged_in'])) {
			load_templates('pages/visitor/project_data_extraction_visitor', $data);
		} else {
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

	private function insert_log($activity, $module, $id_project)
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

	public function deleted_project()
	{
		try {
			$id_project = $this->input->post('id_project');
			$this->load->model("Project_Model");

			$this->Project_Model->deleted_project($id_project);

			$activity = "Deleted project " . $id_project;
			$this->insert_log($activity, 1, null);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function export_doc($id_project)
	{
		try {
			require_once('C:\xampp\htdocs\Thoth\application\third_party\vendor\autoload.php');
			//require_once(APPPATH.'third_party/vendor/autoload.php');

			$this->load->model('Project_Model');

			$project = $this->Project_Model->get_project($id_project);
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('C:\xampp\htdocs\Thoth\export\template.docx');
			//$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_url('export/template.docx'));

			$templateProcessor->setValue('title', $project->get_title());

			$members = "";
			foreach ($project->get_members() as $member) {
				$members .= $member->get_name() . ", ";
			}
			$templateProcessor->setValue('member', $members);

			$emails = "";
			foreach ($project->get_members() as $member) {
				$emails .= $member->get_email() . ", ";
			}
			$templateProcessor->setValue('email', $emails);

			$inst = "";
			foreach ($project->get_members() as $member) {
				$inst .= $member->get_institution() . ", ";
			}
			$templateProcessor->setValue('instituition', $inst);

			$templateProcessor->setValue('description', $project->get_description());

			$templateProcessor->setValue('objectives', $project->get_objectives());

			$domains = "";
			foreach ($project->get_domains() as $domain) {
				$domains .= $domain . ", ";
			}
			$templateProcessor->setValue('domain', $domains);

			$languages = "";
			foreach ($project->get_languages() as $language) {
				$languages .= $language . ", ";
			}
			$templateProcessor->setValue('language', $languages);

			$studies = "";
			foreach ($project->get_study_types() as $study) {
				$studies .= $study . ", ";
			}
			$templateProcessor->setValue('study_type', $studies);

			$keywords = "";
			foreach ($project->get_keywords() as $keyword) {
				$keywords .= $keyword . ", ";
			}
			$templateProcessor->setValue('keyword', $keywords);

			$research = $project->get_research_questions();
			$size = sizeof($research);
			$templateProcessor->cloneRow('id_rq', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_rq#' . ($i + 1);
				$id2 = 'rq_desc#' . ($i + 1);
				$templateProcessor->setValue($id1, $research[$i]->get_id());
				$templateProcessor->setValue($id2, $research[$i]->get_description());
			}

			$databases = $project->get_databases();
			$size = sizeof($databases);
			$templateProcessor->cloneRow('db_name', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'db_name#' . ($i + 1);
				$id2 = 'db_link#' . ($i + 1);
				$templateProcessor->setValue($id1, $databases[$i]->get_name());
				$templateProcessor->setValue($id2, $databases[$i]->get_link());
			}

			$terms = $project->get_terms();
			$size = sizeof($terms);
			$templateProcessor->cloneRow('term', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'term#' . ($i + 1);
				$id2 = 'synonym#' . ($i + 1);
				$templateProcessor->setValue($id1, $terms[$i]->get_description());
				$synonyms = "";
				foreach ($terms[$i]->get_synonyms() as $syn) {
					$synonyms .= $syn . ' OR ';
				}
				$templateProcessor->setValue($id2, $synonyms);
			}

			$strings = $project->get_search_strings();
			$size = sizeof($strings);
			$templateProcessor->cloneRow('db_string', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'db_string#' . ($i + 1);
				$id2 = 'string#' . ($i + 1);
				$templateProcessor->setValue($id1, $strings[$i]->get_database());
				$templateProcessor->setValue($id2, $strings[$i]->get_description());
			}

			$templateProcessor->setValue('strategy', $project->get_search_strategy());

			$templateProcessor->setValue('inclusion_rule', $project->get_inclusion_rule());
			$in_criteria = $project->get_inclusion_criteria();
			$size = sizeof($in_criteria);
			$templateProcessor->cloneRow('id_inclusion', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_inclusion#' . ($i + 1);
				$id2 = 'in_criteria#' . ($i + 1);
				$templateProcessor->setValue($id1, $in_criteria[$i]->get_id());
				$templateProcessor->setValue($id2, $in_criteria[$i]->get_description());
			}

			$templateProcessor->setValue('exclusion_rule', $project->get_exclusion_rule());
			$ex_criteria = $project->get_exclusion_criteria();
			$size = sizeof($ex_criteria);
			$templateProcessor->cloneRow('id_exclusion', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_exclusion#' . ($i + 1);
				$id2 = 'ex_criteria#' . ($i + 1);
				$templateProcessor->setValue($id1, $ex_criteria[$i]->get_id());
				$templateProcessor->setValue($id2, $ex_criteria[$i]->get_description());
			}

			$score_min = $project->get_score_min();

			if (is_null($score_min)) {
				$templateProcessor->setValue('ge_min_to_app', "");
			} else {
				$templateProcessor->setValue('ge_min_to_app', $score_min->get_description());
			}

			$qa_scores = $project->get_quality_scores();
			$size = sizeof($qa_scores);
			$templateProcessor->cloneRow('start_in', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'start_in#' . ($i + 1);
				$id2 = 'end_in#' . ($i + 1);
				$id3 = 'ge_score#' . ($i + 1);
				$templateProcessor->setValue($id1, $qa_scores[$i]->get_start_interval());
				$templateProcessor->setValue($id2, $qa_scores[$i]->get_end_interval());
				$templateProcessor->setValue($id3, $qa_scores[$i]->get_description());
			}

			$qa_questions = $project->get_questions_quality();
			$size = sizeof($qa_questions);
			$templateProcessor->cloneRow('id_qa', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_qa#' . ($i + 1);
				$id2 = 'description_qa#' . ($i + 1);
				$id3 = 'rules_qa#' . ($i + 1);
				$id4 = 'weight#' . ($i + 1);
				$id5 = 'min_to_app#' . ($i + 1);
				$templateProcessor->setValue($id1, $qa_questions[$i]->get_id());
				$templateProcessor->setValue($id2, $qa_questions[$i]->get_description());

				$rules = $qa_questions[$i]->get_scores();
				$scores = "";
				$len = sizeof($rules);
				for ($j = 0; $j < $len; $j++) {
					$scores .= $rules[$j]->get_score_rule() . "\n";
				}
				$templateProcessor->setValue($id3, $scores);

				$templateProcessor->setValue($id4, $qa_questions[$i]->get_weight());
				$minimum = $qa_questions[$i]->get_min_to_approve();
				if ($minimum != null) {
					$templateProcessor->setValue($id5, $minimum->get_score_rule());
				} else {
					$templateProcessor->setValue($id5, "");
				}
			}

			$qe_questions = $project->get_questions_extraction();
			$size = sizeof($qe_questions);
			$templateProcessor->cloneRow('id_qe', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_qe#' . ($i + 1);
				$id2 = 'description_qe#' . ($i + 1);
				$id3 = 'type#' . ($i + 1);
				$id4 = 'option#' . ($i + 1);
				$templateProcessor->setValue($id1, $qe_questions[$i]->get_id());
				$templateProcessor->setValue($id2, $qe_questions[$i]->get_description());
				$templateProcessor->setValue($id3, $qe_questions[$i]->get_type());

				$ops = $qe_questions[$i]->get_options();
				$options = "";
				$len = sizeof($ops);
				for ($j = 0; $j < $len; $j++) {
					$options .= $ops[$j] . "\n";
				}
				$templateProcessor->setValue($id4, $options);

			}

			$file = 'C:\xampp\htdocs\Thoth\export\P' . $id_project . '.docx';
			//$file = './export/P' . $id_project . '.docx';
			$templateProcessor->saveAs($file);

		} catch
		(Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	private function progress_planning($project)
	{
		$errors = array();
		$progress = 11;
		if (!is_null($project->get_domains())) {
			$size = sizeof($project->get_domains());
			if ($size > 0) {
				$progress += 2.75;
			} else {
				array_push($errors, "Add Domains");
			}
		} else {
			array_push($errors, "Add Domains");
		}

		if (!is_null($project->get_languages())) {
			$size = sizeof($project->get_languages());
			if ($size > 0) {
				$progress += 2.75;
			} else {
				array_push($errors, "Add Languages");
			}
		} else {
			array_push($errors, "Add Languages");
		}

		if (!is_null($project->get_study_types())) {
			$size = sizeof($project->get_study_types());
			if ($size > 0) {
				$progress += 2.75;
			} else {
				array_push($errors, "Add Study Types");
			}
		} else {
			array_push($errors, "Add Study Types");
		}

		if (!is_null($project->get_keywords())) {
			$size = sizeof($project->get_keywords());
			if ($size > 0) {
				$progress += 2.75;
			} else {
				array_push($errors, "Add Keywords");
			}
		} else {
			array_push($errors, "Add Keywords");
		}

		if (!is_null($project->get_research_questions())) {
			$size = sizeof($project->get_research_questions());
			if ($size > 0) {
				$progress += 11;
			} else {
				array_push($errors, "Add Research Questions");
			}
		} else {
			array_push($errors, "Add Research Questions");
		}

		if (!is_null($project->get_databases())) {
			$size = sizeof($project->get_databases());
			if ($size > 0) {
				$progress += 11;
			} else {
				array_push($errors, "Add Databases");
			}
		} else {
			array_push($errors, "Add Databases");
		}

		if (!is_null($project->get_terms())) {
			$size = sizeof($project->get_terms());
			if ($size > 0) {
				$progress += 5.5;
			} else {
				array_push($errors, "Add Terms");
			}
		} else {
			array_push($errors, "Add Terms");
		}

		if (!is_null($project->get_search_strings())) {
			$size = sizeof($project->get_search_strings());
			if ($size > 0) {
				$progress += 5.5;
			} else {
				array_push($errors, "Add Search Strings");
			}
		} else {
			array_push($errors, "Add Search Strings");
		}

		if (!is_null($project->get_search_strategy())) {
			$progress += 11;
		} else {
			array_push($errors, "Add Search Strategy");
		}

		if (!is_null($project->get_inclusion_rule())) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Inclusion Rule");
		}

		if (!is_null($project->get_exclusion_rule())) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Exclusion Rule");
		}

		if (!is_null($project->get_inclusion_criteria())) {
			$size = sizeof($project->get_inclusion_criteria());
			if ($size > 0) {
				$progress += 2.75;
			} else {
				array_push($errors, "Add Inclusion Criteria");
			}
		} else {
			array_push($errors, "Add Inclusion Criteria");
		}

		if (!is_null($project->get_exclusion_criteria())) {
			$size = sizeof($project->get_exclusion_criteria());
			if ($size > 0) {
				$progress += 2.75;
			} else {
				array_push($errors, "Add Exclusion Criteria");
			}
		} else {
			array_push($errors, "Add Exclusion Criteria");
		}

		if (!is_null($project->get_score_min())) {
			$progress += 3.6;
		} else {
			array_push($errors, "Add Score Minimum");
		}

		if (!is_null($project->get_quality_scores())) {
			$size = sizeof($project->get_quality_scores());
			if ($size > 0) {
				$progress += 3.6;
			} else {
				array_push($errors, "Add Quality Scores");
			}
		} else {
			array_push($errors, "Add Quality Scores");
		}

		if (!is_null($project->get_questions_quality())) {
			$size = sizeof($project->get_questions_quality());
			if ($size > 0) {
				$progress += 3.8;
			} else {
				array_push($errors, "Add Question Quality");
			}
		} else {
			array_push($errors, "Add Question Quality");
		}

		if (!is_null($project->get_questions_extraction())) {
			$size = sizeof($project->get_questions_extraction());
			if ($size > 0) {
				$progress += 12;
			} else {
				array_push($errors, "Add Question Extraction");
			}
		} else {
			array_push($errors, "Add Question Extraction");
		}

		$data['errors'] = $errors;
		$data['progress'] = $progress;
		return $data;
	}

	private function progress_import_studies($project)
	{
		$errors = array();
		$progress = 0;
		$data['errors'] = $errors;
		$data['progress'] = $progress;
		return $data;
	}

	private function progress_study_selection($project)
	{
		$errors = array();
		$progress = 0;
		$data['errors'] = $errors;
		$data['progress'] = $progress;
		return $data;
	}

	private function progress_quality_assessement($project)
	{
		$errors = array();
		$progress = 0;
		$data['errors'] = $errors;
		$data['progress'] = $progress;
		return $data;
	}

	private function progress_data_extraction($project)
	{
		$errors = array();
		$progress = 0;
		$data['errors'] = $errors;
		$data['progress'] = $progress;
		return $data;
	}

}
