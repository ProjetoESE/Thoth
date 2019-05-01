<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Project_Controller extends Pattern_Controller
{
	/**
	 * @param $id
	 */
	public function open($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->export_doc($id);

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_overview($id);
			$data['logs'] = $this->Project_Model->get_logs_project($id);

			$this->load_views('pages/project/project', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function planning($id)
	{
		try {

			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_planning($id);
			$data['languages'] = $this->Project_Model->get_all_languages();
			$data['study_types'] = $this->Project_Model->get_all_study_types();
			$data['databases'] = $this->Project_Model->get_all_databases();
			$data['rules'] = $this->Project_Model->get_all_rules();
			$data['question_types'] = $this->Project_Model->get_all_types();

			$this->load_views('pages/project/project_planning', $data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function conducting($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_import($id);
			$data['bib'] = $this->Project_Model->get_name_bibs($id);
			$data['num_papers'] = $this->Project_Model->get_num_papers($id);


			$this->load_views('pages/project/project_conducting', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function study_selection($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_selection($id);
			$data['count_papers'] = $this->Project_Model->count_papers_sel_by_user($id);

			$this->load_views('pages/project/project_study_selection', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function reporting($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_report($id);

			$this->load_views('pages/project/project_reporting', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function review_study_selection($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_reviewer_selection($id);
			$data['count_project'] = $this->Project_Model->count_papers_by_status_sel($id);
			$data['count_papers'] = $this->Project_Model->count_papers_reviewer($id);
			$data['status'] = $this->Project_Model->get_status();

			$this->load->model("Selection_Model");
			$data['conflicts'] = $this->Selection_Model->get_conflicts($id);

			$this->load_views('pages/project/project_review_study_selection', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function quality_assessement($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_quality($id);

			$this->load_views('pages/project/project_quality_assessement', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function data_extraction($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_extraction($id);

			$this->load_views('pages/project/project_data_extraction', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function new_project()
	{
		try {
			$this->logged_in();
			load_templates('pages/project/project_new', null);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function add_research($id)
	{
		try {
			$this->validate_level($id, array(1));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_members($id);
			$data['users'] = $this->Project_Model->get_users($id);
			$data['levels'] = $this->Project_Model->get_levels();

			$this->load_views('pages/project/project_add_research', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function edit($id)
	{
		try {
			$this->validate_level($id, array(1));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_edit($id);

			$this->load_views('pages/project/project_edit', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function created_project()
	{
		try {
			$this->logged_in();

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$objectives = $this->input->post('objectives');

			$this->load->model("Project_Model");
			$id_project = $this->Project_Model->created_project($title, $description, $objectives, $this->session->email);

			$activity = "Created the project " . $title;
			$this->insert_log($activity, 1, $id_project);

			redirect('open/' . $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function add_member()
	{
		try {
			$email = $this->input->post('email');
			$id_project = $this->input->post('id_project');
			$level = $this->input->post('level');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$name = $this->Project_Model->add_member($email, $level, $id_project);

			$activity = "Added member " . $email;
			$this->insert_log($activity, 1, $id_project);

			echo $name;

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function edited_project()
	{
		try {
			$title = $this->input->post('title');
			$id_project = $this->input->post('id_project');
			$description = $this->input->post('description');
			$objectives = $this->input->post('objectives');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->edit_project($title, $description, $objectives, $id_project);

			$activity = "Edited project";
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function deleted_project()
	{
		try {
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->deleted_project($id_project);

			$activity = "Deleted project " . $id_project;
			$this->insert_log($activity, 1, null);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id_project
	 */
	private function export_doc($id_project)
	{
		try {
			//require_once('C:\xampp\htdocs\Thoth\application\third_party\vendor\autoload.php');
			require_once(APPPATH . 'third_party/vendor/autoload.php');

			$this->load->model('Project_Model');

			$project = $this->Project_Model->get_project_export($id_project);
			//$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('C:\xampp\htdocs\Thoth\export\template.docx');
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_url('export/template.docx'));

			$templateProcessor->setValue('title', $project->get_title());

			$members = "";
			$array = $project->get_members();
			foreach ($array as $key => $member) {
				end($array);
				if ($key === key($array)) {
					$members .= $member->get_name();
				} else {
					$members .= $member->get_name() . ", ";
				}
			}
			$templateProcessor->setValue('member', $members);

			$emails = "";
			$array = $project->get_members();
			foreach ($array as $key => $member) {
				end($array);
				if ($key === key($array)) {
					$emails .= $member->get_email();
				} else {
					$emails .= $member->get_email() . ", ";
				}
			}
			$templateProcessor->setValue('email', $emails);

			$inst = "";
			$array = $project->get_members();
			foreach ($array as $key => $member) {
				end($array);
				if ($key === key($array)) {
					$inst .= $member->get_institution();
				} else {
					$inst .= $member->get_institution() . ", ";
				}

			}
			$templateProcessor->setValue('instituition', $inst);

			$templateProcessor->setValue('description', $project->get_description());

			$templateProcessor->setValue('objectives', $project->get_objectives());

			$domains = "";
			$array = $project->get_domains();
			foreach ($array as $key => $domain) {
				end($array);
				if ($key === key($array)) {
					$domains .= $domain;
				} else {
					$domains .= $domain . ", ";
				}
			}
			$templateProcessor->setValue('domain', $domains);

			$languages = "";
			$array = $project->get_languages();
			foreach ($array as $key => $language) {
				end($array);
				if ($key === key($array)) {
					$languages .= $language;
				} else {
					$languages .= $language . ", ";
				}

			}
			$templateProcessor->setValue('language', $languages);

			$studies = "";
			$array = $project->get_languages();
			foreach ($array as $key => $study) {
				end($array);
				if ($key === key($array)) {
					$studies .= $study;
				} else {
					$studies .= $study . ", ";
				}
			}
			$templateProcessor->setValue('study_type', $studies);

			$keywords = "";
			$array = $project->get_keywords();
			foreach ($array as $key => $keyword) {
				end($array);
				if ($key === key($array)) {
					$keywords .= $keyword;
				} else {
					$keywords .= $keyword . ", ";
				}
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
				$array = $terms[$i]->get_synonyms();
				foreach ($array as $key => $syn) {
					end($array);
					if ($key === key($array)) {
						$synonyms .= $syn;
					} else {
						$synonyms .= $syn . ' OR ';
					}

				}
				$templateProcessor->setValue($id2, $synonyms);
			}

			$strings = $project->get_search_strings();
			$size = sizeof($strings);
			$templateProcessor->cloneRow('db_string', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'db_string#' . ($i + 1);
				$id2 = 'string#' . ($i + 1);
				$templateProcessor->setValue($id1, $strings[$i]->get_database()->get_name());
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
					$scores .= $rules[$j]->get_score_rule() . " - " . $rules[$j]->get_description() . ";\n";

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
					$options .= $ops[$j] . ";\n";
				}
				$templateProcessor->setValue($id4, $options);

			}

			//$file = 'C:\xampp\htdocs\Thoth\export\P' . $id_project . '.docx';
			$file = './export/P' . $id_project . '.docx';
			$templateProcessor->saveAs($file);

		} catch
		(Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function delete_member()
	{
		try {
			$id_project = $this->input->post('id_project');
			$email = $this->input->post('email');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->delete_member($email, $id_project);

			$activity = "Deleted member " . $email;
			$this->insert_log($activity, 1, null);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	 *
	 */
	public function edit_level()
	{
		try {
			$id_project = $this->input->post('id_project');
			$email = $this->input->post('email');
			$level = $this->input->post('level');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->edit_level($email, $level, $id_project);

			$activity = "Edit level " . $level . " member " . $email;
			$this->insert_log($activity, 1, null);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


}
